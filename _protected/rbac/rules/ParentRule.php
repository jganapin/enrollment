<?php
namespace app\rbac\rules;

use yii\rbac\Rule;

/**
 * Checks if authorID matches user passed via params
 */
class ParentRule extends Rule
{
    public $name = 'isParent';

    /**
     * @param  string|integer $user   The user ID.
     * @param  Item           $item   The role or permission that this rule is associated with
     * @param  array          $params Parameters passed to ManagerInterface::checkAccess().
     * @return boolean                A value indicating whether the rule permits the role or 
     *                                permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['auth_rule']) ? $params['auth_rule']->name == $user : false;
    }
}