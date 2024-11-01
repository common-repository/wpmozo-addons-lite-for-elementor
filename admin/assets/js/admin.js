!(function (e) {
    "use strict";
    e(function () {
            // Fill metafields value in hidden field on blur.
            if ( e('body').find('.wpmozo_ae_team_member_skills').length > 0 ) {
                e('body').on('blur', '.wpmozo_ae_team_member_skills', function(){
                    let skills = [];
                    e('.wpmozo_ae_team_member_skills').each(function(){
                        let value = e(this).val();
                        if ( value ){
                            skills.push( e(this).val() );
                        }
                    });
                    e('#wpmozo_ae_team_member_skills').val(skills);
                });
            }

            // Fill metafields value in hidden field on blur.
            if ( e('body').find('.wpmozo_ae_team_member_skills_value').length > 0 ) {
                e('body').on('blur', '.wpmozo_ae_team_member_skills_value', function(){
                    let skills_val = [];
                    e('.wpmozo_ae_team_member_skills_value').each(function(){
                        let value = e(this).val();
                        if ( value ) {
                            skills_val.push( e(this).val() );
                        }
                    });
                    e('#wpmozo_ae_team_member_skills_value').val(skills_val);
                });
            }
            // Add Row.
            e('body').on('click', '.wpmozo_repeator_meta_field_add_row', function(){
                let row  = '<div class="wpmozo_repeator_meta_field_row">';
                    row += '<div class="wpmozo_repeator_meta_field">';
                    row += '<input type="text" class="wpmozo_ae_team_member_skills" placeholder="Skill" required />';
                    row += '<input type="number" class="wpmozo_ae_team_member_skills_value" placeholder="Skill Value Between 0 to 100" step="1" min="0" max="100"/>';
                    row += '</div>';
                    row += '<p class="wpmozo_repeator_meta_field_row_controls">';
                    row += '<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_remove_row">-</span>';
                    row += '<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_add_row">+</span>';
                    row += '</p>'
                    row += '</div>';

                if ( e(this).closest('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_remove_row').length < 1 ) {
                    e(this).closest('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_row_controls').prepend('<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_remove_row">-</span>');
                }
                e(this).closest('.wpmozo_repeator_meta_field_row').after(row);
                e(this).closest('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_row_controls .wpmozo_repeator_meta_field_add_row').remove();
            });
            
            // Remove Row.
            e('body').on('click', '.wpmozo_repeator_meta_field_remove_row', function(){
                if ( e(this).parents('.wpmozo_repeator_meta_fields').find('.wpmozo_repeator_meta_field_row').length === 2 ) {
                    let control = '<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_add_row">+</span>';
                    if ( e(this).closest('.wpmozo_repeator_meta_field_row').prev('.wpmozo_repeator_meta_field_row').length > 0 ) {
                        e(this).closest('.wpmozo_repeator_meta_field_row').prev('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_row_controls .wpmozo_repeator_meta_field_remove_row').remove();
                        e(this).closest('.wpmozo_repeator_meta_field_row').prev('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_row_controls').append(control);
                    } else {
                        e(this).closest('.wpmozo_repeator_meta_field_row').next('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_row_controls .wpmozo_repeator_meta_field_remove_row').remove();
                    }
                } else {
                    let control = '<span class="wpmozo_repeator_meta_field_add_row_control wpmozo_repeator_meta_field_add_row">+</span>';
                    if ( e(this).closest('.wpmozo_repeator_meta_field_row').nextAll('.wpmozo_repeator_meta_field_row').length === 0 ) {
                        e(this).closest('.wpmozo_repeator_meta_field_row').prev('.wpmozo_repeator_meta_field_row').find('.wpmozo_repeator_meta_field_row_controls').append(control);
                    }
                }
                e(this).closest('.wpmozo_repeator_meta_field_row').remove();
                e('.wpmozo_ae_team_member_skills').trigger('blur');
                e('.wpmozo_ae_team_member_skills_value').trigger('blur');
            });
    });
})(jQuery);