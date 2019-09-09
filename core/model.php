<?php

namespace controllers;
define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'site_profiles');

class DBClass {

    private $server, $user, $pass, $dbname, $db;

    function __construct($server, $user, $pass, $dbname) {

        $this->server = $server;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->openConnection();
    }

    public function openConnection() {

        if (!$this->db) {

            global $connection;
            $connection = mysqli_connect($this->server, $this->user, $this->pass);
            if ($connection == true) {

                $selectDB = mysqli_select_db($connection, $this->dbname);
                if ($selectDB == true) {

                    $this->db = true;
                    mysqli_query($connection, 'SET NAMES UTF8');
                    return true;
                } else {

                    return false;
                }
            } else {

                return false;
            }
        } else {

            return true;
        }
    }

    public function select($what, $from, $where = null, $order = null) {

        global $connection;
        $what = mysqli_real_escape_string($connection, $what);
        $sql = 'SELECT ' . $what . ' FROM ' . $from;
        if ($where != null) $sql .= ' WHERE ' . $where;
        if ($order != null) $sql .= ' ORDER BY ' . $order;

        global $connection;
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

    public function insert($table, $values, $rows = null) {

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
        $insert .= ' VALUES ('  . $values . ')';
        $ins = mysqli_query($connection, $insert);
        return ($ins) ? true : false;

    }

    public function update($table,$what,$value,$where = null,$limit = null) {

        global $connection;
        $value = mysqli_real_escape_string($connection, $value);
        $update = 'UPDATE ' . $table . ' SET ' . $what . " = '" . $value . "'";
        if ($where != null) $update .= ' WHERE ' . $where;
        if ($limit != null) $update .= ' LIMIT ' . $limit;
        $updated = mysqli_query($connection, $update);
        return ($updated) ? true : false;
    }

    public function delete($table, $where = null) {

        global $connection;
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        if ($where == null) $sql = 'DELETE ' . $table;
        $deleted = mysqli_query($connection, $sql);
        return ($deleted) ? true : false;
    }

    public function closeConnection() {

        global $connection;
        if ($this->db) {

            if (mysqli_close($connection)) {

                $this->db = false;
                return true;
            } else {

                return false;
            }
        }
    }
}
