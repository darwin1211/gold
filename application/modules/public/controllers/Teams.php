<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Teams extends My_Controller
{
    private $_team_listing_headers = 'team_listing_headers';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
         $this->load->model('Team_model');

        $this->load->model('Prediction_master_model');
        $this->load->model('Prediction_master_field_model');

        $this->load->library('commonlibrary');
        $this->load->library('commonlib');
        $this->load->library('session');
        $this->load->library("Upload");
    }

    public function addteam($team_id = null)
    {

        $userdata = $_SESSION['my_userdata'];

        if (empty($userdata) || $userdata['usertype'] != 'admin') {
            redirect('/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('team_name', 'Team Name', 'required|trim');


        $dataArray = array();

        if ($this->form_validation->run() == FALSE) {
            $dataArray['form_caption'] = 'Add Team';
            $dataArray['form_action'] = current_url();

            if (!empty($team_id)) {
                $record = $this->Team_model->get_team_by_id($team_id);
                if (!empty($record)) {
                    $dataArray['form_caption'] = 'Edit Team';
                    $dataArray['team_id'] = $record->team_id;
                    $dataArray['team_name'] = $record->team_name;
                    $dataArray['team_logo'] = $record->team_logo;
                }
            } else {
                $postdata = $this->input->post();

                if (!empty($postdata)) {
                    $dataArray = $postdata;
                    $dataArray['form_caption'] = 'Add Team';
                    $dataArray['form_action'] = current_url();
                }
            }

            $dataArray['local_js'] = array(
                'jquery.validate',
                'moment',
                'jquery-ui'
            );
            $dataArray['local_css'] = array(
                'jquery-ui',
                'customstylesheet',
            );
            $this->load->view('/team-form', $dataArray);
        } else {

            //  p($_FILES );



            $dataValues = array(
                'team_name' => $this->input->post('team_name'),
            );

            $product_picture_config = getCustomConfigItem('teams_image');

            if (!empty($_FILES['team_logo']['name'])) {
                if ($this->commonlibrary->is_file_uploaded('team_logo')) {
                    $new_client_image = $this->upload->upload_file("team_logo", $product_picture_config['upload_path'], $product_picture_config);
                    $dataValues['team_logo'] = $new_client_image;
                }
            }

            if (!empty($team_id)) {
                $dataValues['team_id'] = $team_id;
            }

            $this->Team_model->save_team($dataValues);

            if ($team_id) {
                $this->session->set_flashdata('message', 'Team updated successfully.');
            } else {
                $this->session->set_flashdata('message', 'Team saved successfully.');
            }
            redirect('admin/teams');
        }
    }


    public function listteamdata()
    {
        $this->load->library('Datatable');
        $arr = $this->config->config[$this->_team_listing_headers];
        $cols = array_keys($arr);
        $pagingParams = $this->datatable->get_paging_params($cols);

        $resultdata = $this->Team_model->get_all_teams($pagingParams);

        $json_output = $this->datatable->get_json_output($resultdata, $this->_team_listing_headers);
        $this->load->setTemplate('json');
        $this->load->view('json', $json_output);
    }

    public function listteams()
    {
        $userdata = $_SESSION['my_userdata'];

        if (empty($userdata) || $userdata['usertype'] != 'admin') {
            redirect('/');
        }

        $this->load->library('Datatable');
        $message = $this->session->flashdata('message');

        $table_config = array(
            'source' => site_url('admin/teams/listteamdata'),
            'datatable_class' => $this->config->config["datatable_class"],
        );

        $dataArray = array(
            'table' => $this->datatable->make_table($this->_team_listing_headers, $table_config),
            'message' => $message
        );

        $dataArray['local_css'] = array(
            'dataTables.bootstrap4',
            'responsive.bootstrap4'
        );

        $dataArray['local_js'] = array(
            'dataTables.min',
            'jquery.dataTables.bootstrap',
            'dataTables.fnFilterOnReturn',
            'dataTables.bootstrap4',
            'dataTables.responsive',
            'responsive.bootstrap4'
        );

        $dataArray['table_heading'] = 'Team List';
        $dataArray['new_entry_link'] = base_url() . 'admin/addteam';
        $dataArray['new_entry_caption'] = 'Add Team';
        $this->load->view('/prediction-list', $dataArray);
    }

    public function deleteteam($team_id)
    {
        $this->Team_model->delete_team_by_id($team_id);
        $this->session->set_flashdata('message', 'Team delete successfully');
        redirect('admin/teams');
    }

    public function gettaxbyid()
    {
        $tax_id = $this->input->post('tax_id');
        $result = $this->Tax_model->getTaxById($tax_id);
        echo json_encode($result);
    }


    public function viewTax($tax_id = null)
    {

        $userdata = $_SESSION['my_userdata'];

        if (empty($userdata) || $userdata['usertype'] != 'admin') {
            redirect('/');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Tax Title', 'required|trim');
        $this->form_validation->set_rules('tax_slab', 'Tax Slab %', 'required|trim');
        $this->form_validation->set_rules('igst', 'IGST Tax', 'required|trim');
        $this->form_validation->set_rules('cgst', 'CGST Tax', 'required|trim');
        $this->form_validation->set_rules('sgst', 'SGST Tax', 'required|trim');

        $dataArray = array();

        if ($this->form_validation->run() == FALSE) {
            $dataArray['form_caption'] = 'View Tax';
            $dataArray['form_action'] = current_url();

            if (!empty($tax_id)) {

                $taxrecord = $this->Tax_model->getTaxById($tax_id);
                if (!empty($taxrecord)) {
                    $dataArray['form_caption'] = 'View Tax';
                    $dataArray['tax_id'] = $taxrecord->tax_id;
                    $dataArray['title'] = $taxrecord->title;
                    $dataArray['tax_slab'] = $taxrecord->tax_slab;
                    $dataArray['igst'] = $taxrecord->igst;
                    $dataArray['cgst'] = $taxrecord->cgst;
                    $dataArray['sgst'] = $taxrecord->sgst;
                }
            } else {
                $postdata = $this->input->post();

                if (!empty($postdata)) {
                    $dataArray = $postdata;
                    $dataArray['form_caption'] = $this->lang->line('add') . " " . $this->lang->line('lottery');
                    $dataArray['form_action'] = current_url();
                    $dataArray['lottery_draw_day'] = empty($postdata["lottery_draw_day"]) ? "" : $postdata["lottery_draw_day"];
                } else {
                    $dataArray["lottery_start_tickets_number"] = '';
                    $dataArray["total_tickets"] = '';
                }
            }

            $dataArray['local_js'] = array(
                'jquery.validate',
                'moment',
                'jquery-ui'
            );
            $dataArray['local_css'] = array(
                'jquery-ui',
                'customstylesheet',
            );

            $this->load->view('/view-tax-form', $dataArray);
        } else {

            $date_addded = date("Y-m-d h:i:s");

            $dataValues = array(
                'title' => $this->input->post('title'),
                'tax_slab' => $this->input->post('tax_slab'),
                'igst' => $this->input->post('igst'),
                'cgst' => $this->input->post('cgst'),
                'sgst' => $this->input->post('sgst'),
            );

            if (!empty($tax_id)) {
                $dataValues['tax_id'] = $tax_id;
            }
            $tax_id = $this->Tax_model->savetax($dataValues);
            $this->session->set_flashdata('message', 'Tax saved successfully.');
            redirect('admin/tax');
        }
    }
}
