<?php

class Apimodel extends CI_Model
{
    public function insert($name, $email)
    {
        $sql = $this->db->query("INSERT INTO apitable(name, email) values ('$name', '$email')");
    }

    public function edit($id)
    {
        $sqls = $this->db->get_where('apitable', array('id' => $id));
        return $sqls->result();
    }

    public function update($id, $name, $email)
    {
         $data = array(
            'name' => $name,
            'email' => $email
        );
        $this->db->where('id', $id);
        $this->db->update('apitable', $data);
    } 

    public function deleterecords($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("apitable");
    }
}
