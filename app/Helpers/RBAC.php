<?php

namespace App\Helpers;

use \Auth;

class RBAC
{
	/**
	 * Get authenticated user
	 */
	public function user()
	{
		return Auth::user();
	}

	/**
	 * Check if user has role
	 */
	public function hasRole($roles)
	{
		return $this->user()->hasRole($roles);
	}

	/**
	 * Check if user has admin role
	 */
	public function isAdmin()
	{
		return $this->hasRole('Admin');
	}

	/**
	 * Check if user has officer role
	 */
	public function isOfficer()
	{
		return $this->hasRole('Officer');
	}

	/**
	 * Check if user has permission
	 */
	public function hasPermission($name)
	{
		return $this->user()->hasPermissionTo($name);
	}

	/**
	 * Check if user has permission
	 */
	public function hasPerm($name)
	{
		return $this->hasPermission($name);
	}
}