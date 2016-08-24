<?php
/**
 * Created by PhpStorm.
 * User: victorruan
 * Date: 16/8/24
 * Time: 上午11:34
 */

namespace VictorRuan\base;

/**
 * php实现的简单 activerecord
 */
class ActiveRecord extends Object
{

    public static $db;

    /**
     * 设置 pdo 对象 例如 new \PDO('sqlite:test.db')
     * @param \PDO $db
     */
    public static function setDb(\PDO $db){
        self::$db = $db;
    }


    public static function execute($sql, $param = []) {
        return  (($sth = self::$db->prepare($sql)) && $sth->execute($param));
    }

    /**
     * helper function to query one record by sql and params.
     * @param string $sql The SQL to find record.
     * @param array $param The param will be bind to PDOStatement.
     * @param ActiveRecord $obj The object, if find record in database, will assign the attributes in to this object.
     * @param bool $single if set to true, will find record and fetch in current object, otherwise will find all records.
     * @return bool|ActiveRecord|array
     */
    public static function _query($sql, $param = [], $obj = null, $single=false) {
        if ($sth = self::$db->prepare($sql)) {
            $sth->setFetchMode( PDO::FETCH_INTO , ($obj ? $obj : new get_called_class()));
            $sth->execute($param);
            if ($single) return $sth->fetch( PDO::FETCH_INTO ) ? $obj->dirty() : false;
            $result = array();
            while ($obj = $sth->fetch( PDO::FETCH_INTO )) $result[] = clone $obj->dirty();
            return $result;
        }
        return false;
    }
}