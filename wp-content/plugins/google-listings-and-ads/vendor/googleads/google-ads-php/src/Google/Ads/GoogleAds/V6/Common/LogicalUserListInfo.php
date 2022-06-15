<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/common/user_lists.proto

namespace Google\Ads\GoogleAds\V6\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Represents a user list that is a custom combination of user lists.
 *
 * Generated from protobuf message <code>google.ads.googleads.v6.common.LogicalUserListInfo</code>
 */
class LogicalUserListInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * Logical list rules that define this user list. The rules are defined as a
     * logical operator (ALL/ANY/NONE) and a list of user lists. All the rules are
     * ANDed when they are evaluated.
     * Required for creating a logical user list.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v6.common.UserListLogicalRuleInfo rules = 1;</code>
     */
    private $rules;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Ads\GoogleAds\V6\Common\UserListLogicalRuleInfo[]|\Google\Protobuf\Internal\RepeatedField $rules
     *           Logical list rules that define this user list. The rules are defined as a
     *           logical operator (ALL/ANY/NONE) and a list of user lists. All the rules are
     *           ANDed when they are evaluated.
     *           Required for creating a logical user list.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Ads\GoogleAds\V6\Common\UserLists::initOnce();
        parent::__construct($data);
    }

    /**
     * Logical list rules that define this user list. The rules are defined as a
     * logical operator (ALL/ANY/NONE) and a list of user lists. All the rules are
     * ANDed when they are evaluated.
     * Required for creating a logical user list.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v6.common.UserListLogicalRuleInfo rules = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Logical list rules that define this user list. The rules are defined as a
     * logical operator (ALL/ANY/NONE) and a list of user lists. All the rules are
     * ANDed when they are evaluated.
     * Required for creating a logical user list.
     *
     * Generated from protobuf field <code>repeated .google.ads.googleads.v6.common.UserListLogicalRuleInfo rules = 1;</code>
     * @param \Google\Ads\GoogleAds\V6\Common\UserListLogicalRuleInfo[]|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setRules($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Ads\GoogleAds\V6\Common\UserListLogicalRuleInfo::class);
        $this->rules = $arr;

        return $this;
    }

}

