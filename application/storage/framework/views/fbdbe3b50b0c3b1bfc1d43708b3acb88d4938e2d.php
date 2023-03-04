<div class="row" id="js-projects-modal-add-edit" data-section="<?php echo e($page['section']); ?>"
    data-project-progress="<?php echo e($project['project_progress'] ?? 0); ?>">
    <div class="col-lg-12">
        <!--meta data - creatd by-->
        <?php if(isset($page['section']) && $page['section'] == 'edit'): ?>
        <div class="modal-meta-data">
            <small><strong><?php echo e(cleanLang(__('lang.created_by'))); ?>:</strong>
                <?php echo e($project->first_name ?? runtimeUnkownUser()); ?> |
                <?php echo e(runtimeDate($project->project_created)); ?></small>
        </div>
        <?php endif; ?>

        <!--client<>-->
        <?php if(config('visibility.project_modal_client_fields')): ?>
        <div class="client-selector">

            <!--existing client-->
            <div class="client-selector-container" id="client-existing-container">
                <div class="form-group row">
                    <label
                        class="col-sm-12 col-lg-3 text-left control-label col-form-label required">Company Name*</label>
                    <div class="col-sm-12 col-lg-9">
                        <!--select2 basic search-->
                        <select name="project_clientid" id="project_clientid"
                            class="form-control form-control-sm js-select2-basic-search-modal select2-hidden-accessible"
                            data-ajax--url="<?php echo e(url('/')); ?>/feed/company_names"></select>
                        <!--select2 basic search-->
                                             </select>
                    </div>
                </div>
            </div>

            <!--new client-->
            <div class="client-selector-container hidden" id="client-new-container">
                <div class="form-group row">
                    <label
                        class="col-sm-12 col-lg-4 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.company_name'))); ?>*</label>
                    <div class="col-sm-12 col-lg-8">
                        <input type="text" class="form-control form-control-sm" id="client_company_name"
                            name="client_company_name">
                    </div>
                </div>

                <div class="form-group row">
                    <label
                        class="col-sm-12 col-lg-4 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.first_name'))); ?>*</label>
                    <div class="col-sm-12 col-lg-8">
                        <input type="text" class="form-control form-control-sm" id="first_name" name="first_name"
                            placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-sm-12 col-lg-4 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.last_name'))); ?>*</label>
                    <div class="col-sm-12 col-lg-8">
                        <input type="text" class="form-control form-control-sm" id="last_name" name="last_name"
                            placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <label
                        class="col-sm-12 col-lg-4 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.email_address'))); ?>*</label>
                    <div class="col-sm-12 col-lg-8">
                        <input type="text" class="form-control form-control-sm" id="email" name="email" placeholder="">
                    </div>
                </div>
            </div>

            <!--option buttons-->
            <div class="client-selector-links">
                <a href="javascript:void(0)" class="client-type-selector" data-type="new"
                    data-target-container="client-new-container"><?php echo app('translator')->get('lang.new_client'); ?></a> |
                <a href="javascript:void(0)" class="client-type-selector active" data-type="existing"
                    data-target-container="client-existing-container"><?php echo app('translator')->get('lang.existing_client'); ?></a>
            </div>

            <!--client type indicator-->
            <input type="hidden" name="client-selection-type" id="client-selection-type" value="existing">
        </div>

        <?php endif; ?>
        <!--/#client-->

        <!--SELECT TEMPLATE-->
        <?php if($page['section'] == 'create'): ?>
        <div class="client-selectors"  style="display: none;">
            <div class="form-group row">
                <label class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo app('translator')->get('lang.template'); ?></label>
                <div class="col-sm-12 col-lg-9">
                    <select class="select2-basic form-control form-control-sm" id="project_template_selector"
                        data-url="<?php echo e(url('projects/prefill-project?action=reset')); ?>" data-allow-clear="true"
                        name="project_template_selector">
                        <option></option>
                        <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($template->project_id); ?>"
                            data-url="<?php echo e(url('projects/prefill-project?id='.$template->project_id)); ?>"
                            data-id="<?php echo e($template->project_id); ?>" data-title="<?php echo e($template->project_title); ?>"
                            data-category="<?php echo e($template->category_id); ?>"
                            data-billing-rate="<?php echo e($template->project_billing_rate); ?>"
                            data-billing-type="<?php echo e($template->project_billing_type); ?>"
                            data-billing-estimated-hours="<?php echo e($template->project_billing_estimated_hours); ?>"
                            data-billing-estimated-cost="<?php echo e($template->project_billing_costs_estimate); ?>"
                            data-assigned-manage-tasks="<?php echo e($template->assignedperm_tasks_collaborate); ?>"
                            data-client-task-view="<?php echo e($template->clientperm_tasks_view); ?>"
                            data-client-task-collaborate="<?php echo e($template->clientperm_tasks_collaborate); ?>"
                            data-client-task-create="<?php echo e($template->clientperm_tasks_create); ?>"
                            data-client-view-timesheets="<?php echo e($template->clientperm_timesheets_view); ?>"
                            data-client-view-expenses="<?php echo e($template->clientperm_expenses_view); ?>"
                            data-title="<?php echo e($template->project_title); ?>"><?php echo e($template->project_title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!--/#SELECT TEMPLATE-->


        <!--TITLE-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.project_title'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm" id="project_title" name="project_title"
                    placeholder="" value="<?php echo e($project->project_title ?? ''); ?>">
            </div>
        </div>
        <!--/#TITLE-->

        <!--START DATE-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label required"><?php echo e(cleanLang(__('lang.start_date'))); ?>*</label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm pickadate" name="project_date_start"
                    autocomplete="off" value="<?php echo e(runtimeDatepickerDate($project->project_date_start ?? '')); ?>">
                <input class="mysql-date" type="hidden" name="project_date_start" id="project_date_start"
                    value="<?php echo e($project->project_date_start ?? ''); ?>">
            </div>
        </div>
        <!--/#START DATE-->

        <!--DUE DATE-->
        <div class="form-group row">
            <label
                class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.deadline'))); ?></label>
            <div class="col-sm-12 col-lg-9">
                <input type="text" class="form-control form-control-sm pickadate" name="project_date_due"
                    autocomplete="off" value="<?php echo e(runtimeDatepickerDate($project->project_date_due ?? '')); ?>">
                <input class="mysql-date" type="hidden" name="project_date_due" id="project_date_due"
                    value="<?php echo e($project->project_date_due ?? ''); ?>">
            </div>
        </div>
        <!--/#DUE DATE-->

        <!--CUSTOMER FIELDS [expanded] (july 2021 - the div container is necessary for project templates)-->
        <?php if(config('system.settings_customfields_display_projects') == 'expanded'): ?>
        <div id="project-custom-fields-container">
            <?php echo $__env->make('misc.customfields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php endif; ?>
        <!--/#CUSTOMER FIELDS [expanded]-->

        
        <!--automation-->
        <?php if(config('mode.create') && config('system.settings2_projects_automation_default_status') == 'enabled'): ?>
        <div class="form-group form-group-checkbox row">
            <label class="col-10 col-form-label text-left"><?php echo app('translator')->get('lang.automation'); ?> <span class="align-middle text-info font-16"
                    data-toggle="tooltip" title="<?php echo app('translator')->get('lang.apply_default_automation_project'); ?>" data-placement="top"><i class="ti-info-alt"></i></span></label>
            <div class="col-2 text-right p-t-5">
                <input type="checkbox" id="automation" name="automation" class="filled-in chk-col-light-blue"
                    <?php echo e(runtimePrechecked(config('system.settings2_projects_automation_default_status'))); ?>>
                <label class="p-l-30" for="automation"></label>
            </div>
        </div>
        <?php endif; ?>

        <div class="line"></div>

        <!--DESCRIPTION & DETAILS-->
        <div class="spacer row" style="display:none;">
            <div class="col-sm-8">
                <span class="title"><?php echo e(cleanLang(__('lang.description_and_details'))); ?></span class="title">
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="switch  text-right">
                    <label>
                        <input type="checkbox" class="js-switch-toggle-hidden-content"
                            data-target="edit_project_description_toggle">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="hidden" id="edit_project_description_toggle">

            <textarea id="project_description" name="project_description"
                class="tinymce-textarea" row="2"><?php echo e($project->project_description ?? ''); ?></textarea>




            <!--tags-->
            <div class="form-group row m-t-20" style="display: none;">
                <label
                    class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.tags'))); ?></label>
                <div class="col-sm-12 col-lg-9">
                    <select name="tags" id="tags"
                        class="form-control form-control-sm select2-multiple <?php echo e(runtimeAllowUserTags()); ?> select2-hidden-accessible"
                        multiple="multiple" tabindex="-1" aria-hidden="true">
                        <!--array of selected tags-->
                        <?php if(isset($page['section']) && $page['section'] == 'edit'): ?>
                        <?php $__currentLoopData = $project->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $selected_tags[] = $tag->tag_title ; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <!--/#array of selected tags-->
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tag->tag_title); ?>"
                            <?php echo e(runtimePreselectedInArray($tag->tag_title ?? '', $selected_tags ?? [])); ?>>
                            <?php echo e($tag->tag_title); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <!--/#tags-->

            <div class="line m-t-30"></div>

        </div>
        <!--/#DESCRIPTION & DETAILS-->



        <!--CATEGORY & USERS-->
        <div class="spacer row">
            <div class="col-sm-8">
                <span class="title">Assigned Member</span></span class="title">
            </div>
            <div class="col-sm-4 text-right"  style="display: none;">
                <div class="switch">
                    <label>
                        <input type="checkbox" class="js-switch-toggle-hidden-content"
                            data-target="edit_category_and_users" checked>
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>

        <div id="edit_category_and_users">
            <div class="form-group row m-t-30" style="display: none;">
                <label for="example-month-input"
                    class="col-sm-12 col-lg-3 col-form-label text-left required"><?php echo e(cleanLang(__('lang.category'))); ?></label>
                <div class="col-sm-12 col-lg-9">
                    <select class="select2-basic form-control form-control-sm" id="project_categoryid"
                        name="project_categoryid">
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->category_id); ?>"
                            <?php echo e(runtimePreselected($project->project_categoryid ?? '', $category->category_id)); ?>><?php echo e(runtimeLang($category->category_name)); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>


            <!--assigned team members<>-->
            <?php if(config('visibility.project_modal_assign_fields')): ?>
            <div class="form-group row">
                <label
                    class="col-sm-12 col-lg-3 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.assigned'))); ?> Staff</label>
                <div class="col-sm-12 col-lg-9">
                    <?php if(config('system.settings_projects_permissions_basis') == 'category_based'): ?>
                    <div class="alert alert-info"><?php echo app('translator')->get('lang.projects_assigned_auto'); ?></div>
                    <?php else: ?>
                    <select name="assigned" id="assigned"
                        class="form-control form-control-sm select2-basic select2-multiple select2-tags"
                        multiple="multiple" tabindex="-1">
                        <!--array of assigned-->
                        <?php if(isset($page['section']) && $page['section'] == 'edit' && isset($project->assigned)): ?>
                        <?php $__currentLoopData = $project->assigned; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $assigned[] = $user->id; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <!--/#array of assigned-->
                        <!--users list-->
                        <?php $__currentLoopData = config('system.team_members'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"
                            <?php echo e(runtimePreselectedInArray($user->id ?? '', $assigned ?? [])); ?>><?php echo e($user->full_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--/#users list-->
                    </select>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <!--/#assigned team members-->

            <!--project manager<>-->
            <?php if(config('visibility.project_modal_assign_fields')): ?>
            <div class="form-group row">
                <label
                    class="col-sm-12 col-lg-3 text-left control-label col-form-label">Team Leader
                    <a class="align-middle font-14 toggle-collapse" href="#project_manager_info" role="button"><i
                            class="ti-info-alt text-themecontrast"></i></a></label>
                <div class="col-sm-12 col-lg-9">
                    <select name="manager" id="manager" class="select2-basic form-control form-control-sm"
                        data-allow-clear="true">
                        <!--array of assigned-->
                        <?php if(isset($page['section']) && $page['section'] == 'edit' && isset($project->managers)): ?>
                        <?php $__currentLoopData = $project->managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $manager[] = $user->id; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <!--/#array of assigned-->
                        <!--users list-->
                        <?php $__currentLoopData = config('system.team_members'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option></option>
                        <option value="<?php echo e($user->id); ?>"
                            <?php echo e(runtimePreselectedInArray($user->id ?? '', $manager ?? [])); ?>><?php echo e($user->full_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--/#users list-->
                    </select>
                </div>
            </div>
            <?php endif; ?>

            <!--/#project manager-->
            <div class="collapse" id="project_manager_info">
                <div class="alert alert-info"><?php echo e(cleanLang(__('lang.project_manager_info'))); ?></div>
            </div>

            <div class="line m-t-30"></div>
        </div>
        <!--/#PROJECT PROGRESS-->


        <!--PROJECT PROGRESS-->
        <div class="spacer row" style="display: none;">
            <div class="col-sm-8">
                <span class="title"><?php echo e(cleanLang(__('lang.progress'))); ?></span class="title">
            </div>
            <div class="col-sm-4 text-right">
                <div class="switch">
                    <label>
                        <input type="checkbox" class="js-switch-toggle-hidden-content"
                            data-target="edit_project_progress">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="hidden" id="edit_project_progress" style="display: none;">

            <div class="form-group form-group-checkbox row" style="display: none;">
                <label class="col-4 col-form-label text-left"><?php echo e(cleanLang(__('lang.set_progress_manually'))); ?>?</label>
                <div class="col-7 text-left p-t-5" style="display: none;">
                    <input checked type="checkbox" id="project_progress_manually" name="project_progress_manually"
                        class="filled-in chk-col-light-blue"
                        <?php echo e(runtimePrechecked($project['project_progress_manually'] ?? '')); ?> >
                    <label for="project_progress_manually"></label>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 p-l-30">
                    <div id="edit_project_progress_bar"></div>
                </div>
                <div class="col-sm-2 text-right">
                    <strong>
                        <span id="edit_project_progress_display">20</span>%</strong>
                </div>
            </div>
            <input type="hidden" name="project_progress" value="<?php echo e($project->project_progress ?? ''); ?>"
                id="project_progress" />
            <div class="line m-t-30" style="display: none;"></div>
        </div>
        <!--/#PROJECT PROGRESS-->

        <!--PROJECT OPTIONS-->
        <div class="spacer row" style="display: none;">
            <div class="col-sm-8" style="display: none;">
                <span class="title"><?php echo e(cleanLang(__('lang.additional_settings'))); ?></span class="title">
            </div>
            <div class="col-sm-4 text-right" style="display: none;">
                <div class="switch">
                    <label>
                        <input type="checkbox" class="js-switch-toggle-hidden-content"
                            data-target="edit_project_setings">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="hidden" id="edit_project_setings">




            <!--PROJECT BILLING-->
            <?php if(auth()->user()->role->role_projects_billing == 2): ?>
            <!--project options-->
            <div class="spacer row">
                <div class="col-sm-8">
                    <span class="title"><?php echo e(cleanLang(__('lang.project_billing'))); ?></span class="title">
                </div>
                <div class="col-sm-4 text-right">
                    <div class="switch">
                        <label>
                            <input type="checkbox" class="js-switch-toggle-hidden-content"
                                data-target="edit_project_billing">
                            <span class="lever switch-col-light-blue"></span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="hidden" id="edit_project_billing">
                <div class="highlighted-panel">
                    <!--billing type-->
                    <div class="form-group row">
                        <label for="example-month-input"
                            class="col-sm-12 col-lg-4 col-form-label text-left"><?php echo e(cleanLang(__('lang.billing'))); ?></label>
                        <div class="col-sm-12 col-lg-4">
                            <input type="number" class="form-control form-control-sm" id="project_billing_rate"
                                name="project_billing_rate" placeholder=""
                                value="<?php echo e($project['project_billing_rate'] ?? ''); ?>">

                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <select class="select2-basic form-control form-control-sm" id="project_billing_type"
                                data-allow-clear="false" name="project_billing_type">
                                <option value="hourly"
                                    <?php echo e(runtimePreselected( 'hourly', $project['project_billing_type'] ?? '')); ?>>
                                    <?php echo e(cleanLang(__('lang.hourly'))); ?></option>
                                <option value="fixed"
                                    <?php echo e(runtimePreselected( 'fixed', $project['project_billing_type'] ?? '')); ?>>
                                    <?php echo e(cleanLang(__('lang.fixed_fee'))); ?></option>
                            </select>
                        </div>
                    </div>
                    <!--estimated hours-->
                    <div class="form-group row">
                        <label
                            class="col-sm-12 col-lg-4 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.estimated_hours'))); ?>

                            <a class="align-middle font-16 toggle-collapse" href="#project_estimated_hours_info"
                                role="button"><i class="ti-info-alt text-themecontrast"></i></a></label>
                        <div class="col-sm-12 col-lg-4">
                            <input type="number" class="form-control form-control-sm"
                                id="project_billing_estimated_hours" name="project_billing_estimated_hours"
                                placeholder="" value="<?php echo e($project['project_billing_estimated_hours'] ?? ''); ?>">
                        </div>
                        <div class="collapse col-sm-12 m-t-15" id="project_estimated_hours_info">
                            <div class="alert alert-info"><?php echo e(cleanLang(__('lang.project_estimated_hours_info'))); ?></div>
                        </div>
                    </div>
                    <!--cost estimate-->
                    <div class="form-group row m-b-0">
                        <label
                            class="col-sm-12 col-lg-4 text-left control-label col-form-label"><?php echo e(cleanLang(__('lang.costs_estimate'))); ?>

                            <a class="align-middle font-16 toggle-collapse" href="#project_cost_estimate_info"
                                role="button"><i class="ti-info-alt text-themecontrast"></i></a></label>
                        <div class="col-sm-12 col-lg-4">
                            <input type="number" class="form-control form-control-sm"
                                id="project_billing_costs_estimate" name="project_billing_costs_estimate" placeholder=""
                                value="<?php echo e($project['project_billing_costs_estimate'] ?? ''); ?>">
                        </div>
                        <div class="collapse col-sm-12 m-t-15" id="project_cost_estimate_info">
                            <div class="alert alert-info"><?php echo e(cleanLang(__('lang.project_cost_estimate_info'))); ?></div>
                        </div>
                    </div>
                </div>
                <div class="line m-t-30"></div>
            </div>
            <?php endif; ?>
            <!--/#PROJECT BILLLING-->


            <!--TEAM PERMISSIONS-->
            <?php if(config('visibility.project_modal_project_permissions')): ?>
            <div class="spacer row" >
                <div class="col-sm-8">
                    <span class="title"><?php echo e(cleanLang(__('lang.assigned_user_permissions'))); ?></span>
                </div>
                <div class="col-sm-4">
                    <div class="switch  text-right">
                        <label>
                            <input type="checkbox" name="show_more_settings_projects" id="show_more_settings_projects"
                                class="js-switch-toggle-hidden-content" data-target="edit_project_assigned_permissions">
                            <span class="lever switch-col-light-blue"></span>
                        </label>
                    </div>
                </div>
            </div>
            <!--spacer-->
            <!--option toggle-->
            <div class="hidden highlighted-panel" id="edit_project_assigned_permissions">
                <div class="form-group form-group-checkbox row m-b-0">
                    <label class="col-5 col-form-label text-left"><?php echo e(cleanLang(__('lang.task_collaboration'))); ?> <a
                            class="align-middle font-16 toggle-collapse" href="#info_task_collaboration"
                            role="button"><i class="ti-info-alt text-themecontrast"></i></a> </label>
                    <div class="col-7 text-left p-t-5">
                        <input type="checkbox" id="assignedperm_tasks_collaborate" name="assignedperm_tasks_collaborate"
                            class="filled-in chk-col-light-blue"
                            <?php echo e(runtimePrechecked($project['assignedperm_tasks_collaborate'] ?? '')); ?>>
                        <label for="assignedperm_tasks_collaborate"></label>
                    </div>
                </div>
                <!--info: taskcollaborations-->
                <div class="collapse" id="info_task_collaboration">
                    <div class="alert alert-info"><?php echo e(cleanLang(__('lang.task_collaboration_info'))); ?></div>
                </div>
                <div class="line m-t-30"></div>
            </div>
            <!--/#TEAM PERMISSIONS-->


            <!--CLIENT PERMISSIONS-->
            <div class="spacer row">
                <div class="col-sm-8">
                    <span class="title"><?php echo e(cleanLang(__('lang.client_project_permissions'))); ?></span class="title">
                </div>
                <div class="col-sm-4">
                    <div class="switch text-right">
                        <label>
                            <input type="checkbox" name="show_more_settings_projects2" id="show_more_settings_projects2"
                                class="js-switch-toggle-hidden-content" data-target="edit_project_permissions_tasks">
                            <span class="lever switch-col-light-blue"></span>
                        </label>
                    </div>
                </div>
            </div>
            <div id="edit_project_permissions_tasks" class="hidden highlighted-panel">
                <!--permission - view tasks-->
                <div class="form-group form-group-checkbox row">
                    <label class="col-5 col-form-label text-left"><?php echo e(cleanLang(__('lang.view_tasks'))); ?></label>
                    <div class="col-7 text-left p-t-5">
                        <input type="checkbox" id="clientperm_tasks_view" name="clientperm_tasks_view"
                            class="filled-in chk-col-light-blue"
                            <?php echo e(runtimePrechecked($project['clientperm_tasks_view'] ?? '')); ?>>
                        <label for="clientperm_tasks_view"></label>
                    </div>
                </div>
                <!--permission - task participation-->
                <div class="form-group form-group-checkbox row">
                    <label
                        class="col-5 col-form-label text-left required"><?php echo e(cleanLang(__('lang.task_participation'))); ?>**</label>
                    <div class="col-7 text-left p-t-5">
                        <input type="checkbox" id="clientperm_tasks_collaborate" name="clientperm_tasks_collaborate"
                            class="filled-in chk-col-light-blue"
                            <?php echo e(runtimePrechecked($project['clientperm_tasks_collaborate'] ?? '')); ?>>
                        <label for="clientperm_tasks_collaborate"></label>
                    </div>
                </div>
                <!--permission - create tasks-->
                <div class="form-group form-group-checkbox row">
                    <label
                        class="col-5 col-form-label text-left required"><?php echo e(cleanLang(__('lang.create_tasks'))); ?>**</label>
                    <div class="col-7 text-left p-t-5">
                        <input type="checkbox" id="clientperm_tasks_create" name="clientperm_tasks_create"
                            class="filled-in chk-col-light-blue"
                            <?php echo e(runtimePrechecked($project['clientperm_tasks_create'] ?? '')); ?>>
                        <label for="clientperm_tasks_create"></label>
                    </div>
                </div>
                <div class="line"></div>
                <!--permission - view timesheets-->
                <div class="form-group form-group-checkbox row">
                    <label class="col-5 col-form-label text-left"><?php echo e(cleanLang(__('lang.view_time_sheets'))); ?></label>
                    <div class="col-7 text-left p-t-5">
                        <input type="checkbox" id="clientperm_timesheets_view" name="clientperm_timesheets_view"
                            class="filled-in chk-col-light-blue"
                            <?php echo e(runtimePrechecked($project['clientperm_timesheets_view'] ?? '')); ?>>
                        <label for="clientperm_timesheets_view"></label>
                    </div>
                </div>
                <!--permission - view expenses-->
                <div class="form-group form-group-checkbox row">
                    <label class="col-5 col-form-label text-left"><?php echo e(cleanLang(__('lang.view_expenses'))); ?></label>
                    <div class="col-7 text-left p-t-5">
                        <input type="checkbox" id="clientperm_expenses_view" name="clientperm_expenses_view"
                            class="filled-in chk-col-light-blue"
                            <?php echo e(runtimePrechecked($project['clientperm_expenses_view'] ?? '')); ?>>
                        <label for="clientperm_expenses_view"></label>
                    </div>
                </div>

                <div><small class="text-bold">** <?php echo e(cleanLang(__('lang.if_items_selected_then_viewing_perm'))); ?></small>
                </div>
                <div class="line m-t-30"></div>
            </div>
            <!--/#CLIENT PERMISSIONS-->
            <?php endif; ?>

            <!--pass source-->
            <input type="hidden" name="source" value="<?php echo e(request('source')); ?>">

        </div>


        <!--CUSTOMER FIELDS [collapsed]-->
        <?php if(config('system.settings_customfields_display_projects') == 'toggled'): ?>
        <div class="spacer row" style="display:none;">
            <div class="col-sm-12 col-lg-8">
                <span class="title"><?php echo e(cleanLang(__('lang.more_information'))); ?></span class="title">
            </div>
            <div class="col-sm-12 col-lg-4">
                <div class="switch  text-right">
                    <label>
                        <input type="checkbox" name="add_client_option_other" id="add_client_option_other"
                            class="js-switch-toggle-hidden-content" data-target="projects_custom_fields_collaped">
                        <span class="lever switch-col-light-blue"></span>
                    </label>
                </div>
            </div>
        </div>
        <div id="projects_custom_fields_collaped" class="hidden">

            <?php if(config('app.application_demo_mode')): ?>
            <!--DEMO INFO-->
            <div class="alert alert-info">
                <h5 class="text-info"><i class="sl-icon-info"></i> Demo Info</h5>
                These are custom fields. You can change them or <a
                    href="<?php echo e(url('app/settings/customfields/projects')); ?>">create your own.</a>
            </div>
            <?php endif; ?>

            <div id="project-custom-fields-container">
                <?php echo $__env->make('misc.customfields', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <?php endif; ?>
            <!--/#CUSTOMER FIELDS [collapsed]-->






            <!--notes-->
            <div class="row">
                <div class="col-12">
                    <div><small><strong>* <?php echo e(cleanLang(__('lang.required'))); ?></strong></small></div>
                </div>
            </div>
        </div>

        <!--redirect to project-->
        <?php if(config('visibility.project_show_project_option')): ?>
        <div class="form-group form-group-checkbox row" style="display:none;">
            <div class="col-12 text-left p-t-5">
                <input type="checkbox" id="show_after_adding" name="show_after_adding"
                    class="filled-in chk-col-light-blue" checked="checked">
                <label for="show_after_adding"><?php echo e(cleanLang(__('lang.show_project_after_its_created'))); ?></label>
            </div>
        </div>
        <?php endif; ?>
    </div><?php /**PATH /home/u967487462/domains/iprotectph.online/public_html/application/resources/views/pages/projects/components/modals/add-edit-inc.blade.php ENDPATH**/ ?>