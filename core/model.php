<?php

namespace core;

class DBClass
{
    function __construct()
    {

        require_once "connection.php";
    }

    public function selectAll($from, $where = null, $order = null)
    {

        global $connection;
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        $sql = 'SELECT * FROM ' . $from;
        if ($where != null) $sql .= ' WHERE ' . $where;
        if ($order != null) $sql .= ' ORDER BY ' . $order;

        $query = mysqli_query($connection, $sql);
        if ($query == true) {

            $fetched = null;
            $rows = mysqli_num_rows($query);
            for ($i = 0; $i < $rows; $i++) {

                $results = mysqli_fetch_assoc($query);
                $key = array_keys($results);
                $numKeys = count($key);
                for ($x = 0; $x < $numKeys; $x++) {

                    $fetched[$i][$key[$x]] = $results[$key[$x]];
                }
            }
            return $fetched;
        } else {

            return false;
        }
    }

    public function selectOne($what, $from, $where = null, $order = null)
    {

        global $connection;
        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        $what = mysqli_real_escape_string($connection, $what);
        $sql = 'SELECT ' . $what . ' FROM ' . $from;
        if ($where != null) $sql .= ' WHERE ' . $where;
        if ($order != null) $sql .= ' ORDER BY ' . $order;

        $query = mysqli_query($connection, $sql);
        if ($query == true) {

            $fetched = null;
            $rows = mysqli_num_rows($query);
            for ($i = 0; $i < $rows; $i++) {

                $results = mysqli_fetch_assoc($query);
                $key = array_keys($results);
                $numKeys = count($key);
                for ($x = 0; $x < $numKeys; $x++) {

                    $fetched[$i][$key[$x]] = $results[$key[$x]];
                }
            }
            return $fetched;
        } else {

            return false;
        }
    }

    public function insert($table, $values, $rows = null)
    {

        global $connection;
        $insert = 'INSERT INTO ' . $table;
        if ($rows != null) $insert .= ' (' . $rows . ')';

        $numValues = count($values);
        for ($i = 0; $i < $numValues; $i++) {

            if (is_string($values[$i]))
                $values[$i] = mysqli_real_escape_string($connection, $values[$i]);
            $values[$i] = '"' . $values[$i] . '"';
        }
        $values = implode(',', $values);
        $insert .= ' VALUES (' . $values . ')';
        $ins = mysqli_query($connection, $insert);
        return ($ins) ? true : false;

    }

    public function update($table, $what, $value, $where = null, $limit = null)
    {

        global $connection;
        $value = mysqli_real_escape_string($connection, $value);
        $update = 'UPDATE ' . $table . ' SET ' . $what . " = '" . $value . "'";
        if ($where != null) $update .= ' WHERE ' . $where;
        if ($limit != null) $update .= ' LIMIT ' . $limit;
        $updated = mysqli_query($connection, $update);
        return ($updated) ? true : false;
    }

    public function delete($table, $where = null)
    {

        global $connection;
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        if ($where == null) $sql = 'DELETE ' . $table;
        $deleted = mysqli_query($connection, $sql);
        return ($deleted) ? true : false;
    }

    function __destruct()
    {

        global $connection;
        if (mysqli_close($connection)) {

            return true;
        } else {

            return false;
        }
    }
}
