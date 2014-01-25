<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Anime_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    
    // Get the list of anime when slug is false, else get specific anime 
    public function get_anime($slug = FALSE)
    {
        if ($slug === FALSE)
        {
            $query = $this->db->get('anime');
            return $query->result_array();
        }

        $query = $this->db->get_where('anime', array('slug' => $slug));
        return $query->row_array();
    }
    
    // Get the specific episode of the specified anime.
    public function get_anime_episode($anime, $slug)
    {
        $query = $this->db->query("SELECT * FROM anime_episodes WHERE anime_id = $anime AND slug = '$slug'");
        return $query->row_array();
    }
    
    // Get the list of episode of specified anime.
    public function get_anime_episode_list($anime)
    {
        $query = $this->db->get_where('anime_episodes', array('anime_id' => $anime));
        return $query->result_array();
    }
}
?>
