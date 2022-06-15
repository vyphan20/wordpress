jQuery(document).ready(function ($) {
    'use strict';
    jQuery(document).on('click', '.vi-wpvs-variation-style', function (e) {
        jQuery('.vi-wpvs-variation-wrap-option-available').remove();
        jQuery('.vi-wpvs-variation-wrap-option.vi-wpvs-variation-wrap-option-show').removeClass('vi-wpvs-variation-wrap-option-show');
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
    });
    jQuery(document).on('click', 'body', function (e) {
        jQuery('.vi-wpvs-variation-wrap-option-available').remove();
        jQuery('.vi-wpvs-variation-wrap-option.vi-wpvs-variation-wrap-option-show').removeClass('vi-wpvs-variation-wrap-option-show');
    });
    jQuery(document).on('click', '.vi-wpvs-variation-wrap-option-available .vi-wpvs-option-wrap', function (e) {
        e.preventDefault();
        e.stopPropagation();
        e.stopImmediatePropagation();
        if (jQuery(this).hasClass('vi-wpvs-option-wrap-disable')) {
            return false;
        }
        let current_index = jQuery('.vi-wpvs-variation-wrap-option-available .vi-wpvs-option-wrap').index(jQuery(this));
        jQuery('.vi-wpvs-variation-wrap-option.vi-wpvs-variation-wrap-option-show').removeClass('vi-wpvs-variation-wrap-option-show').find('.vi-wpvs-option-wrap').eq(current_index).trigger('click');
        jQuery('.vi-wpvs-variation-wrap-option-available').remove();
    });
    jQuery(document).on('mouseenter', '.vi-wpvs-variation-wrap-option-available .vi-wpvs-option-wrap', function (e) {
        if (!jQuery(this).hasClass('vi-wpvs-option-wrap-selected') && !jQuery(this).hasClass('vi-wpvs-option-wrap-disable') && !jQuery(this).hasClass('vi-wpvs-product-link')) {
            jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-hover');
        }
    });
    jQuery(document).on('mouseleave', '.vi-wpvs-variation-wrap-option-available .vi-wpvs-option-wrap', function (e) {
        if (!jQuery(this).hasClass('vi-wpvs-option-wrap-selected') && !jQuery(this).hasClass('vi-wpvs-option-wrap-disable')) {
            jQuery(this).removeClass('vi-wpvs-option-wrap-hover').addClass('vi-wpvs-option-wrap-default');
        }
    });
    jQuery(document.body).on('vi_wpvs_variation_form', function () {
        jQuery('.vi_wpvs_variation_form:not(.vi_wpvs_variation_form_init)').each(function () {
            jQuery(this).addClass('vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
        });
    });
    jQuery('.vi_wpvs_variation_form:not(.vi_wpvs_variation_form_init)').each(function () {
        jQuery(this).addClass('vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
    });
    jQuery('.variations_form:not(.vi_wpvs_variation_form),.variations_form:not(.vi_wpvs_variation_form_init)').each(function () {
        jQuery(this).addClass('vi_wpvs_variation_form vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
    });
    jQuery(document).on('ajaxComplete', function (event, jqxhr, settings) {
        jQuery('.vi_wpvs_variation_form:not(.vi_wpvs_variation_form_init)').each(function () {
            jQuery(this).addClass('vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
        });
        jQuery('.variations_form:not(.vi_wpvs_variation_form),.variations_form:not(.vi_wpvs_variation_form_init)').each(function () {
            jQuery(this).addClass('vi_wpvs_variation_form vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
        });
        return false;
    });
});
jQuery(window).on('load', function () {
    'use strict';
    jQuery('.vi_wpvs_variation_form:not(.vi_wpvs_variation_form_init)').each(function () {
        jQuery(this).addClass('vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
    });
    jQuery('.variations_form:not(.vi_wpvs_variation_form),.variations_form:not(.vi_wpvs_variation_form_init)').each(function () {
        jQuery(this).addClass('vi_wpvs_variation_form vi_wpvs_variation_form_init').viwpvs_woo_product_variation_swatches();
    });
});
let vi_wpvs_frontend = function ($form) {
    this.form = $form;
    this.variationData = $form.data('product_variations');
    this.init();
};

vi_wpvs_frontend.prototype.init = function () {
    let vi_wpvs_frontend = this,
        form = this.form,
        variations = this.variationData;
    if (variations && form.find('.vi-wpvs-option-wrap.vi-wpvs-option-wrap-selected').length && form.find('.vi-wpvs-option-wrap.vi-wpvs-option-wrap-selected').length === form.find('.vi-wpvs-select-attribute select').length){
        form.addClass('vi_wpvs_variation_form_has_selected');
        form.on('reset_data', function () {
            if (form.hasClass('vi_wpvs_variation_form_has_selected')) {
                form.removeClass('vi_wpvs_variation_form_has_selected');
                vi_wpvs_frontend.hide_variation();
            }
        });
    }
    form.on('woocommerce_update_variation_values', function () {
        vi_wpvs_frontend.select_variation_item();
    });
    vi_wpvs_frontend.design_variation_item();
    if (form.find('.vi-wpvs-variation-wrap-select-wrap').length) {
        form.find('.vi-wpvs-variation-wrap-select-wrap').each(function (k, item) {
            jQuery(item).parent().parent().parent().css({width: '100%'});
            let select_wrap, select_button;
            select_wrap = jQuery(item).find('.vi-wpvs-variation-wrap-option');
            if (!select_wrap.attr('data-offset_height')) {
                select_wrap.attr('data-offset_height', select_wrap.outerHeight()).removeClass('vi-wpvs-select-hidden').addClass('vi-wpvs-hidden');
            }
            select_button = jQuery(item).find('.vi-wpvs-variation-button-select');
            if (select_wrap.find('.vi-wpvs-option-wrap-selected').length) {
                select_button.find('span').html(select_wrap.find('.vi-wpvs-option-wrap-selected .vi-wpvs-option-select').html());
            }
            select_button.on('click', function (e) {
                e.preventDefault();
                e.stopPropagation();
                let select_wrap_height, scroll_top, window_height, view_able_offset;
                select_wrap_height = parseFloat(select_wrap.attr('data-offset_height'));
                scroll_top = jQuery(window).scrollTop();
                window_height = jQuery(window).outerHeight();
                view_able_offset = jQuery(this).offset().top - scroll_top;
                jQuery('.vi-wpvs-variation-wrap-option.vi-wpvs-variation-wrap-option-show').removeClass('vi-wpvs-variation-wrap-option-show');
                select_wrap.addClass('vi-wpvs-variation-wrap-option-show');
                jQuery('.vi-wpvs-variation-wrap-option-available').remove();
                let new_select = jQuery(item).closest('.vi-wpvs-variation-wrap').clone();
                new_select.find('.vi-wpvs-variation-button-select').remove();
                new_select.find('.vi-wpvs-variation-wrap-option').removeClass('vi-wpvs-hidden vi-wpvs-variation-wrap-option-show');
                new_select.addClass('vi-wpvs-variation-wrap-option-available').css({width: jQuery(this).outerWidth(), left: jQuery(this).offset().left});
                if (scroll_top > view_able_offset || scroll_top < select_wrap_height || window_height > (view_able_offset + select_wrap_height + 40)) {
                    new_select.toggleClass('vi-wpvs-variation-wrap-select-bottom');
                    new_select.css({top: (jQuery(this).offset().top + jQuery(this).outerHeight())});
                } else {
                    new_select.toggleClass('vi-wpvs-variation-wrap-select-top');
                    new_select.css({top: (jQuery(this).offset().top - select_wrap.outerHeight())});
                }
                jQuery('body').append(new_select);
            });
        });
    }
    form.find('.vi-wpvs-option-wrap').each(function (k, item) {
        let attr_div, attr_select, attr_value, val;
        attr_div = jQuery(item).closest('.vi-wpvs-variation-wrap-wrap');
        attr_select = attr_div.find('select.vi-wpvs-select-attribute');
        if (attr_select.length === 0) {
            attr_select = attr_div.find('.vi-wpvs-select-attribute select').eq(0);
        }
        attr_select.find('option').removeClass('vi-wpvs-option-disabled');
        jQuery(item).on('mouseenter', function () {
            if (!jQuery(this).hasClass('vi-wpvs-option-wrap-selected') && !jQuery(this).hasClass('vi-wpvs-option-wrap-disable')) {
                jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-hover');
            }
        }).on('mouseleave', function () {
            if (!jQuery(this).hasClass('vi-wpvs-option-wrap-selected') && !jQuery(this).hasClass('vi-wpvs-option-wrap-disable')) {
                jQuery(this).removeClass('vi-wpvs-option-wrap-hover').addClass('vi-wpvs-option-wrap-default');
            }
        }).on('click', function (e) {
            e.stopPropagation();
            if (jQuery(this).hasClass('vi-wpvs-option-wrap-disable')) {
                e.preventDefault();
                e.stopPropagation();
                return false;
            }
            if (!jQuery(this).parent().hasClass('vi-wpvs-variation-wrap-radio')) {
                e.preventDefault();
                e.stopPropagation();
            }
            jQuery('.vi-wpvs-variation-wrap-option').addClass('vi-wpvs-hidden');
            form.find('.reset_variations').removeClass('vi-wpvs-hidden');
            attr_div.find('.vi-wpvs-option-wrap').removeClass('vi-wpvs-option-wrap-selected vi-wpvs-option-wrap-hover').addClass('vi-wpvs-option-wrap-default');
            if (attr_div.find('.vi-wpvs-variation-wrap').hasClass('vi-wpvs-variation-wrap-select')) {
                attr_div.find('.vi-wpvs-variation-button-select >span ').html(jQuery(this).find('.vi-wpvs-option-select').html());
            }
            if (jQuery(this).find('.vi-wpvs-option-radio').length > 0) {
                attr_div.find('.vi-wpvs-option-radio').prop('checked', false);
                jQuery(this).find('.vi-wpvs-option-radio').prop('checked', true);
                jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-selected');
            }
            attr_value = attr_select.val();
            if (attr_value) {
                attr_value = attr_value.toString();
            }
            val = jQuery(this).data('attribute_value').toString();
            if (val !== attr_value) {
                jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-selected');
                attr_select.val(val).trigger('change');
                vi_wpvs_frontend.select_variation_item();
            } else if (!jQuery(this).parent().hasClass('vi-wpvs-variation-wrap-radio')) {
                if (form.hasClass('vi_wpvs_loop_variation_form')) {
                    if (form.data('wpvs_double_click')) {
                        attr_select.val('').trigger('change');
                        vi_wpvs_frontend.select_variation_item();
                    } else {
                        jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-selected');
                    }
                } else {
                    if (attr_div.data('wpvs_double_click')) {
                        attr_select.val('').trigger('change');
                        vi_wpvs_frontend.select_variation_item();
                    } else {
                        jQuery(this).removeClass('vi-wpvs-option-wrap-default').addClass('vi-wpvs-option-wrap-selected');
                    }
                }
            }
            e.stopPropagation();
        });
    });
    form.find('select:not(.vi-wpvs-select-attribute):not(.vi-wpvs-variation-style-select)').on('change', function () {
        setTimeout(function () {
            vi_wpvs_frontend.select_variation_item();
        }, 500);
    });
    form.find('.reset_variations').on('click', function () {
        vi_wpvs_frontend.select_variation_item();
        vi_wpvs_frontend.hide_variation();
    });
};
vi_wpvs_frontend.prototype.design_variation_item = function () {
    let form = this.form;
    form.find('.vi-wpvs-variation-wrap-wrap').each(function () {
        let $wrap = jQuery(this), variation_wrap = $wrap.parent().parent();
        $wrap.parent().addClass('vi-wpvs-variation-style-content');
        $wrap.find(`div.vi-wpvs-select-attribute select[data-attribute_name="${$wrap.data('wpvs_attribute_name')}"]`).addClass('vi-wpvs-select-attribute');
        variation_wrap.addClass($wrap.data('display_type'));
        if (!$wrap.data('wpvs_attr_title')) {
            variation_wrap.find('.label').addClass('vi-wpvs-hidden');
        }
    });
    form.find('.vi-wpvs-option.vi-wpvs-option-color').each(function (color_item_k, color_item) {
        let colors = jQuery(color_item).data('option_color');
        jQuery(color_item).css({background: colors});
    });
    form.find('.vi-wpvs-variation-wrap-wrap').removeClass('vi-wpvs-hidden');
};
vi_wpvs_frontend.prototype.select_variation_item = function () {
    let form = this.form;
    form.find('.vi-wpvs-label-selected').addClass('vi-wpvs-hidden');
    form.find('.vi-wpvs-variation-wrap-wrap').each(function (k, v) {
        let attrs_value = jQuery(v).find('select option:not(.vi-wpvs-option-disabled)').map(function () {
            return jQuery(this).val();
        });
        jQuery(v).find('.vi-wpvs-option-wrap:not(.vi-wpvs-product-link)').each(function (option_item_k, option_item) {
            let val = jQuery(option_item).data('attribute_value').toString();
            if (jQuery.inArray(val, attrs_value) !== -1) {
                jQuery(option_item).removeClass('vi-wpvs-option-wrap-disable');
            } else {
                jQuery(option_item).removeClass('vi-wpvs-option-wrap-selected').addClass('vi-wpvs-option-wrap-default vi-wpvs-option-wrap-disable');
            }
        });
        if (jQuery(v).data('show_selected_item') && jQuery(v).find('.vi-wpvs-option-wrap-selected').length) {
            if (jQuery(v).parent().parent().find('.vi-wpvs-label-selected').length) {
                jQuery(v).parent().parent().find('.vi-wpvs-label-selected').html(jQuery(v).find('.vi-wpvs-option-wrap-selected').data('attribute_label')).removeClass('vi-wpvs-hidden');
            } else {
                jQuery(v).parent().parent().find('.label').css({
                    display: 'inline-flex',
                    flexWrap: 'wrap',
                    alignItems: 'center'
                })
                    .append('<span class="vi-wpvs-label-selected">' + jQuery(v).find('.vi-wpvs-option-wrap-selected').data('attribute_label') + '</span>');
            }
        }
    });
};
vi_wpvs_frontend.prototype.hide_variation = function () {
    let form= this.form;
    form.find('.reset_variations').addClass('vi-wpvs-hidden');
    form.find('.vi-wpvs-option-wrap').removeClass('vi-wpvs-option-wrap-selected vi-wpvs-option-wrap-out-of-stock').addClass('vi-wpvs-option-wrap-default');
    form.find('.vi-wpvs-option-radio').prop('checked', false);
    form.find('.vi-wpvs-variation-wrap-option').addClass('vi-wpvs-hidden');
    form.find('.vi-wpvs-variation-button-select >span ').html(form.find('.vi-wpvs-option-select:first-child').html());
    form.find('.vi-wpvs-variation-style .vi-wpvs-label-selected').addClass('vi-wpvs-hidden');
};
jQuery.fn.viwpvs_woo_product_variation_swatches = function () {
    new vi_wpvs_frontend(this);
    return this;
};

