<?php

	/**
	 * Flasher
	 *
	 * Some Rails-like `flash[]` functionality for Hummingbird Lite.
	 *
	 * @version  1.0
	 * @author   biohzrdmx <github.com/biohzrdmx>
	 * @license  MIT
	 */
	class Flasher {

		static protected $hash = null;
		static protected $discard = null;

		static function alert($value = null) {
			$ret = self::flash('alert', $value);
			return $ret;
		}

		static function notice($value = null) {
			$ret = self::flash('notice', $value);
			return $ret;
		}

		static function flash($name, $value = null) {
			$ret = null;
			if (! isset( self::$hash ) ) {
				self::$hash = array();
			}
			if ($value !== null) {
				self::$hash[$name] = $value;
			}
			$ret = isset( self::$hash[$name] ) ? self::$hash[$name] : null;
			return $ret;
		}

		static function fromSession() {
			@session_start();
			if (! isset( $_SESSION['flash'] ) ) {
				$_SESSION['flash'] = array();
			}
			self::$hash = $_SESSION['flash'];
			self::discard();
		}

		static function toSession() {
			@session_start();
			self::sweep();
			$_SESSION['flash'] = self::$hash;
		}

		static function keep($name = null) {
			if ($name) {
				$index = array_search($name, self::$hash);
				if ($index) {
					unset( self::$discard[$index] );
				}
			} else {
				self::$discard = array();
			}
		}

		static function discard($name = null) {
			if ($name) {
				self::$discard[] = $name;
			} else {
				self::$discard = array_keys(self::$hash);
			}
		}

		static function sweep() {
			# Delete all flashes that were not marked to keep
			foreach (self::$discard as $key) {
				unset( self::$hash[$key] );
			}
		}
	}

	$site->registerHook('router.beforeRouting', 'Flasher::fromSession');
	$site->registerHook('router.afterRouting', 'Flasher::toSession');
	$site->registerHook('core.redirect', 'Flasher::toSession');

?>