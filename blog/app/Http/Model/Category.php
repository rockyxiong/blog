<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;
    protected $guarded = [];//排除

    /**
     * 获取树形，返回分类级
     * @return array
     */
    public function tree( ){
        $data = $this->orderBy( 'cate_order','asc' )->get();
        return $this->getTree( $data,'cate_name','id','cate_pid' );
    }
    /**
     * @param $data                 需要分类的数据
     * @param $cateName             需要分类的字段
     * @param string $cateId        id字段
     * @param string $catePid       父级ID
     * @param string $pid           初始化父级ID
     * @return array                返回数组
     */
    protected function getTree($data,$cateName,$cateId = 'id',$catePid = 'pid',$pid = '0'){
        $arr = array();
        foreach( $data as $k=>$v ){
            if( $v->$catePid == $pid ){
                $data[$k]['_'.$cateName] = $data[$k][$cateName];
                $arr[] = $data[$k];
                foreach( $data as $m=>$n ){
                    if( $n->$catePid == $v->$cateId ){
                        $data[$m]['_'.$cateName] = '|-- '.$data[$m][$cateName];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}
