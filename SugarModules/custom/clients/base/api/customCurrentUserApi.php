<?php
/*
 *
 * Copyright (C) SugarCRM Inc. All rights reserved.
 */
require_once('clients/base/api/CurrentUserApi.php');

class customCurrentUserApi extends CurrentUserApi
{

    public function registerApiRest()
    {
	    $register = parent::registerApiRest();
		$register['userFilters'] = array(
                'reqType' => 'GET',
                'path' => array('me','filters'),
                'pathVars'=> array(),
                'method' => 'userFilters',
                'shortHelp' => "Returns all the current user's stored filtes",
                'longHelp' => '',
                'ignoreMetaHash' => true,
        );
		return $register;
    }

    /**
     * Retrieves the current user info
     *
     * @param $api
     * @param $args
     * @return array
     */
    public function userFilters($api, $args)
    {
        $current_user = $this->getUserBean();
        include_once ('include/database/DBManager.php');

        $db = &DBManagerFactory::getInstance();
		$query = "select * from filters where created_by='".$current_user->id."' order by module_name,name";
        $result = $db->query($query);
		$filters = array();
        while(($row=$db->fetchByAssoc($result)) != null) {
	       $filters[] = $row;
        }
        return $filters;
    }

}
