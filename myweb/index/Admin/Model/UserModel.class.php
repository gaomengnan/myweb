<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/9/24
 * Time: 16:00
 */
namespace Admin\Model;
use Think\Model\RelationModel;
Class UserModel extends RelationModel{


    protected $tableName='user';

       protected $_link=array(

         'role'=>array(
             'mapping_type'=>MANY_TO_MANY,


             'foreign_key'=>'user_id',
             'relation_table'=>'role_user',
             'relation_key'=>'role_id'


         ),

       );
}
