<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_Anime_Episodes_Table extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => FALSE,
                'auto_increment' => TRUE
            ),
            'anime_id' => array(
                'type' => 'INT',
                'constraint' => '11',
                'null' => FALSE
            ),
            'slug' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'title' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ),
            'description' => array(
                'type' => 'TEXT',
                'null' => TRUE
            ),
            'link' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ),
            'number' => array(
                'type' => 'INT',
                'constraint' => '11',
                'default' => '0',
                'null' => FALSE
            ),
            'part_no' => array(
                'type' => 'INT',
                'constraint' => '11',
                'default' => '0',
                'null' => FALSE
            ),
            'series' => array(
                'type' => 'INT',
                'constraint' => '11',
                'default' => '0',
                'null' => FALSE
            )
            ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('anime_episodes');
    }

    public function down() {
        $this->dbforge->drop_table('anime_episodes');
    }
}