<?php
namespace Fuel\Migrations;

class Lists
{
		
    function up()
    {	
    	try
    	{
	        \DBUtil::create_table(
	    		'lists',
	    		array(
	    		    'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
	    		    'title' => array('type' => 'text'),
	    		    'id_user' => array('constraint' => 11, 'type' => 'int'),
	    		),
	    		array('id'), false, 'InnoDB', 'utf8_general_ci',
	    		array(
                    array(
                        'constraint' => 'foreingKeyListToUsers',
                        'key' => 'id_user',
                        'reference' => array(
                            'table' => 'users',
                            'column' => 'id',
                        ),
                        'on_update' => 'CASCADE',
                        'on_delete' => 'RESTRICT'
                    )
                )
			);
    	}
    	catch(\Database_Exception $e)
		{
		   echo 'list ya creada'; 
		}
    }

    function down()
    {
       \DBUtil::drop_table('lists');
    }

}