<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_welcome extends CI_Model {

    //-------- CREATE -----------------------------------------

    public function create($id, $filename){
       
        $data = array(
            'id' => $id,
            'name' => $this->input->post('name',TRUE),
            'description' => $this->input->post('description',TRUE),
            'filename' => $filename,
        );

        $this->db->insert('post', $data);
    }

    //-------- READ -----------------------------------------

    public function read($id=false){
        if($id==FALSE){
        return $this->db->get('post')->result_array();
    } else {
        $query = $this->db->get_where('post',array('id'=>$id));
        return $query->row();
    } }

    //-------- UPDATE -----------------------------------------

    public function update($id){
        $data = array(
            'id' => $id,
            'name' => $this->input->post('name', TRUE),
            'description' => $this->input->post('description',TRUE),

        );
        $this->db->where('id', $id);
        $this->db->update('post', $data);
    }

    //-------- DELETE -----------------------------------------

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('post');
    }

    public function deleteAll(){
        $this->db->empty_table('post');
    }
}
