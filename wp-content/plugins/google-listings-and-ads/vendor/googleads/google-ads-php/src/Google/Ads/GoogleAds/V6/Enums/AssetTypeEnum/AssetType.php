<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/enums/asset_type.proto

namespace Google\Ads\GoogleAds\V6\Enums\AssetTypeEnum;

use UnexpectedValueException;

/**
 * Enum describing possible types of asset.
 *
 * Protobuf type <code>google.ads.googleads.v6.enums.AssetTypeEnum.AssetType</code>
 */
class AssetType
{
    /**
     * Not specified.
     *
     * Generated from protobuf enum <code>UNSPECIFIED = 0;</code>
     */
    const UNSPECIFIED = 0;
    /**
     * Used for return value only. Represents value unknown in this version.
     *
     * Generated from protobuf enum <code>UNKNOWN = 1;</code>
     */
    const UNKNOWN = 1;
    /**
     * YouTube video asset.
     *
     * Generated from protobuf enum <code>YOUTUBE_VIDEO = 2;</code>
     */
    const YOUTUBE_VIDEO = 2;
    /**
     * Media bundle asset.
     *
     * Generated from protobuf enum <code>MEDIA_BUNDLE = 3;</code>
     */
    const MEDIA_BUNDLE = 3;
    /**
     * Image asset.
     *
     * Generated from protobuf enum <code>IMAGE = 4;</code>
     */
    const IMAGE = 4;
    /**
     * Text asset.
     *
     * Generated from protobuf enum <code>TEXT = 5;</code>
     */
    const TEXT = 5;
    /**
     * Lead form asset.
     *
     * Generated from protobuf enum <code>LEAD_FORM = 6;</code>
     */
    const LEAD_FORM = 6;
    /**
     * Book on Google asset.
     *
     * Generated from protobuf enum <code>BOOK_ON_GOOGLE = 7;</code>
     */
    const BOOK_ON_GOOGLE = 7;

    private static $valueToName = [
        self::UNSPECIFIED => 'UNSPECIFIED',
        self::UNKNOWN => 'UNKNOWN',
        self::YOUTUBE_VIDEO => 'YOUTUBE_VIDEO',
        self::MEDIA_BUNDLE => 'MEDIA_BUNDLE',
        self::IMAGE => 'IMAGE',
        self::TEXT => 'TEXT',
        self::LEAD_FORM => 'LEAD_FORM',
        self::BOOK_ON_GOOGLE => 'BOOK_ON_GOOGLE',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssetType::class, \Google\Ads\GoogleAds\V6\Enums\AssetTypeEnum_AssetType::class);

