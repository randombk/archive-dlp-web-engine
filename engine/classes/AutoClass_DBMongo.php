<?php
/*
 * (C) Copyright 2012 David J. W. Li
 * DLPWEBENGINE
 * Forked from Build 0.2.2.432 of Project DLPSIGAME
 *
 */

/**
 * Class Mongo
 */
class DBMongo
{
	private static $instance = null;
	protected $connect;
	protected $database;
	protected $exception;

	/**
	 *
	 */
	public function __construct()
	{
		try {
			$this->connect = new MongoClient("mongodb://".$GLOBALS['_MONGO']['host'].":".$GLOBALS['_MONGO']['port'], array("connect" => TRUE));
			$this->database = $this->connect->{$GLOBALS['_MONGO']['databasename']};
		} catch (Exception $e) {
			throw new Exception("Connection to Mongo failed");
		}
	}

	/**
	 * @return DBMongo
	 */
	public static function getInstance()
	{
		if (is_null(self::$instance)) {
			self::$instance = new DBMongo();
		}
		return self::$instance;
	}

	/**
	 * @param MongoCollection $collection
	 * @param string $uniqueID
	 * @return array
	 * @throws Exception
	 */
	protected static function get($collection, $uniqueID)
	{
		try {
			$data = $collection->findOne(array('_id' => $uniqueID));
			if (isset($data["__EMPTY__"])) {
				return array();
			} else {
				unset($data["_id"]);
				return $data;
			}
		} catch (Exception $e) {
			throw new Exception("Unknown error while querying Mongo");
		}
	}

	/**
	 * @param MongoCollection $collection
	 * @param string $uniqueID
	 * @param array $content
	 * @return bool
	 * @throws Exception
	 */
	protected static function update($collection, $uniqueID, $content)
	{
		try {
			$content["_id"] = $uniqueID;
			if (!sizeof($content)) {
				$content["__EMPTY__"] = true;
			}
			return $collection->update(array('_id' => $uniqueID), $content, array('upsert' => true));
		} catch (Exception $e) {
			throw new Exception("Unknown error while updating Mongo");
		}
	}
}
