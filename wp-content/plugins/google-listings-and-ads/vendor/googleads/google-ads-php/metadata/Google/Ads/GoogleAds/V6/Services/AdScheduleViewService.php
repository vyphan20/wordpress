<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/ads/googleads/v6/services/ad_schedule_view_service.proto

namespace GPBMetadata\Google\Ads\GoogleAds\V6\Services;

class AdScheduleViewService
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();
        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Http::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
8google/ads/googleads/v6/resources/ad_schedule_view.proto!google.ads.googleads.v6.resourcesgoogle/api/resource.protogoogle/api/annotations.proto"�
AdScheduleViewF

\'googleads.googleapis.com/AdScheduleView:r�Ao
\'googleads.googleapis.com/AdScheduleViewDcustomers/{customer_id}/adScheduleViews/{campaign_id}~{criterion_id}B�
%com.google.ads.googleads.v6.resourcesBAdScheduleViewProtoPZJgoogle.golang.org/genproto/googleapis/ads/googleads/v6/resources;resources�GAA�!Google.Ads.GoogleAds.V6.Resources�!Google\\Ads\\GoogleAds\\V6\\Resources�%Google::Ads::GoogleAds::V6::Resourcesbproto3
�
?google/ads/googleads/v6/services/ad_schedule_view_service.proto google.ads.googleads.v6.servicesgoogle/api/annotations.protogoogle/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto"b
GetAdScheduleViewRequestF

\'googleads.googleapis.com/AdScheduleView2�
AdScheduleViewService�
GetAdScheduleView:.google.ads.googleads.v6.services.GetAdScheduleViewRequest1.google.ads.googleads.v6.resources.AdScheduleView"I���31/v6/{resource_name=customers/*/adScheduleViews/*}�A
$com.google.ads.googleads.v6.servicesBAdScheduleViewServiceProtoPZHgoogle.golang.org/genproto/googleapis/ads/googleads/v6/services;services�GAA� Google.Ads.GoogleAds.V6.Services� Google\\Ads\\GoogleAds\\V6\\Services�$Google::Ads::GoogleAds::V6::Servicesbproto3'
        , true);
        static::$is_initialized = true;
    }
}
