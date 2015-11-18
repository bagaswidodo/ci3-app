<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog_spa extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->model('Blog_model');
        $this->load->helper('url');
    }

    function index()
    {
        //this function will retrive all entry in the database
        $data['query'] = $this->Blog_model->get_all_posts();

       $this->load->view('spa/blog/index', $data);
    }

    public function add_new_entry()
{
    if( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() ) // block un-authorized access
    {
        show_404();
    }
    else
    {
        $data['title'] = 'Add new entry - '.$this->config->item('site_title', 'ion_auth');
        $data['categories'] = $this->blog_model->get_categories();

        $this->load->helper('form');
        $this->load->library(array('form_validation'));

        //set validation rules
        $this->form_validation->set_rules('entry_name', 'Title', 'required|max_length[200]|xss_clean');
        $this->form_validation->set_rules('entry_body', 'Body', 'required|xss_clean');
        $this->form_validation->set_rules('entry_category', 'Category', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('admin/add_new_entry',$data);
        }
        else
        {
            //if valid
            $user = $this->ion_auth->user()->row();
            $title = $this->input->post('entry_name');
            $body = $this->input->post('entry_body');
            $categories = $this->input->post('entry_category');

            $this->blog_model->add_new_entry($user->id,$title,$body,$categories);
            $this->session->set_flashdata('message', '1 new post added!');
            redirect('add-new-entry');
        }
    }
}

	//this function will retrive a post
public function post($id)
{
    $data['query'] = $this->blog_model->get_post($id);
    $data['comments'] = $this->blog_model->get_post_comment($id);
    $data['post_id'] = $id;
    $data['total_comments'] = $this->blog_model->total_comments($id);

    $this->load->helper('form');
    $this->load->library(array('form_validation','session'));

    //set validation rules
    $this->form_validation->set_rules('commentor', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('comment', 'Comment', 'required');

    if($this->blog_model->get_post($id))
    {
        foreach($this->blog_model->get_post($id) as $row)
        {
            //set page title
            $data['title'] = $row->entry_name;
        }

        if ($this->form_validation->run() == FALSE)
        {
            //if not valid
            $this->load->view('blog/post',$data);
        }
        else
        {
            //if valid
            $name = $this->input->post('commentor');
            $email = strtolower($this->input->post('email'));
            $comment = $this->input->post('comment');
            $post_id = $this->input->post('post_id');

            $this->blog_model->add_new_comment($post_id,$name,$email,$comment);
            $this->session->set_flashdata('message', '1 new comment added!');
            redirect('post/'.$id);
        }
    }
    else
        show_404();
	}

// 	public function add_new_category()
// {
//     $data['title'] = 'Add new category - '.$this->config->item('site_title', 'ion_auth');
//
//     if( ! $this->ion_auth->logged_in() && ! $this->ion_auth->is_admin() ) // block un-authorized access
//     {
//         show_404();
//     }
//     else
//     {
//         $this->load->helper('form');
//         $this->load->library(array('form_validation'));
//
//         // set validation rules
//         $this->form_validation->set_rules('category_name', 'Name', 'required|max_length[200]|xss_clean');
//         $this->form_validation->set_rules('category_slug', 'Slug', 'max_length[200]|xss_clean');
//
//         if ($this->form_validation->run() == FALSE)
//         {
//             //if not valid
//             $this->load->view('admin/add_new_category',$data);
//         }
//         else
//         {
//             //if valid
//             $name = $this->input->post('category_name');
//
//             if( $this->input->post('category_slug') != '' )
//                 $slug = $this->input->post('category_slug');
//             else
//                 $slug = strtolower(preg_replace('/[^A-Za-z0-9_-]+/', '-', $name));
//
//             $this->blog_model->add_new_category($name,$slug);
//             $this->session->set_flashdata('message', '1 new category added!');
//             redirect('add-new-category');
//         }
//     }
// }

function add_new_category($name,$slug)
{
    $i = 0;
    $slug_taken = FALSE;

    while( $slug_taken ==  FALSE ) // to avoid duplicate slug
    {
        $category = $this->get_category(NULL,$slug);
        if( $category == FALSE )
        {
            $slug_taken = TRUE;
            $data = array(
                'category_name'    => $name,
                'slug'            => $slug,
            );
            $this->db->insert('entry_category',$data);
        }
        $i = $i + 1;
        $slug = $slug.'-'.$i;
    }
}
}
