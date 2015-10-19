<?php
namespace Admin\Model;
use       Think\Model\RelationModel;
Class ExamRelationModel extends RelationModel{

Protected $tableName = 'title';
Protected $_link=array(
'exam'=>array(

    'mapping_type'=>self::BELONGS_TO,
    'foreign_key'=>'cid',
    'mapping_fields'=>'name',    
     'as_fields'=>'name'    
    
)
);

public function getTrach($type=0){
$field = array('del');
$where = array('del'=>$type);
return $this->field($field,true)->where($where)->relation(true)->select();


}


}
