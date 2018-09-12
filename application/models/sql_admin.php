<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sql_admin extends CI_Model
{
    function login_data($table,$username,$password){
        $query=$this->db->get_where($table, array('ad_username' => $username,'ad_password'=>$password));
        //$query=$this->db->query("select * from $table where ");  
        echo $query->num_rows()."<br>";
        echo $password;
    }
    function select_all($table,$order_by,$order_type){
        $query=$this->db->query("select * from $table ORDER BY $order_by $order_type");
        if ( $query->num_rows() > 0 ){
            $num_rows=$query->num_rows();
            $row = $query->result_array();
            return $row;
        }
    }
    function select_where($table,$field,$id){
        $query=$this->db->query("select * from $table where $field=$id");
        if ( $query->num_rows() > 0 ){
            $row=$query->result_array();
            return $row;
        }else{
            return FALSE;
        }
    }
    function db_num_rows_all($table){
        $query=$this->db->query("select * from $table");
        $num_rows=$query->num_rows();
        return $num_rows;
    }
    function add_process01($table,$data){
        $this->db->insert($table,$data);
    }
    function chk_add_process01($table,$field_chk,$data_chk){
        /*
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field_chk,$this->input->post("ad_username"));
        $query = $this->db->get();
        */
        $query = $this->db->get_where($table,array($field_chk => $data_chk));
        if($query->num_rows()!=0){return FALSE;}else{return TRUE;}
    }
    function update_admin($table,$field,$id,$data){
        $query=$this->db->update($table,$data,array("$field"=>$id));
        //if(!$query){echo $query;}
        //echo $this->db->update_string($table,$data,array("$field"=>$id));
    }
    function del($table,$field,$id){
        $this->db->delete($table,array($field=>$id));
    }
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
}