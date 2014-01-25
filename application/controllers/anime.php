<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    class Anime extends CI_Controller {

        public function __construct()
	{
		parent::__construct();
		$this->load->model('anime_model');
                $this->load->helper('url');
	}
        
        public function index() 
        {   
            $data['anime_list'] = $this->anime_model->get_anime();
            $this->load->view('anime/index', $data);
        }
        
        public function browse($anime) {
            // fetch all list of episodes
           $data['anime'] = $this->anime_model->get_anime($anime);
           $data['episode_list'] = $this->anime_model->get_anime_episode_list($data['anime']['id']);
           
           
           foreach ($data['episode_list'] as $key => $episode)
            {                  
                $episode_title = $data['anime']['name'];
                if($episode['series'] > 0 )
                {
                    $episode_title = $episode_title.' Series '.$episode['series'];
                }

                if($episode['part_no'] > 0)
                {
                    $episode_title = $episode_title.' Part '.$episode['part_no'];
                }

                if($episode['number'] > 0)
                {
                    $episode_title = $episode_title.' Episode '.$episode['number'];
                }
                
                $data['episode_list'][$key]['name'] = $episode_title;
            }
            
            //print_r($data['episode_list']);
            
           $this->load->view('anime/browse',$data);
        }
        
         public function show($anime, $episode) {
            // fetch anime on db if exist
            // get the episode of the anime
            $data['anime'] = $this->anime_model->get_anime($anime);
            $data['episode'] = $this->anime_model->get_anime_episode($data['anime']['id'], 'episode'.$episode);
            
            $episode_title = $data['anime']['name'];
            if($data['episode']['series'] > 0 )
            {
                $episode_title = $episode_title.' Series '.$data['episode']['series'];
            }
            
            if($data['episode']['part_no'] > 0)
            {
                $episode_title = $episode_title.' Part '.$data['episode']['part_no'];
            }
            
            if($data['episode']['number'] > 0)
            {
                $episode_title = $episode_title.' Episode '.$data['episode']['number'];
            }
            
            if(trim($data['episode']['name']) != NULL || trim($data['episode']['name']) != '')
            {
                $episode_title = $episode_title.' : '.$data['episode']['name'];
            }
            
           $data['episode_title'] = $episode_title;
           
           $this->load->view('anime/show',$data);
        }
    }
?>
