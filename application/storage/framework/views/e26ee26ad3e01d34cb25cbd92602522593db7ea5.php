<div class="col-lg-12  col-md-12">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo e(cleanLang(__('lang.my_projects'))); ?></h5>
            <?php $projects = $payload['my_projects'] ; ?>
            <div class="dashboard-projects" id="dashboard-client-projects">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Ticket #</th>
                            <th>Project <?php echo e(cleanLang(__('lang.title'))); ?></th>
                            <th>Date Started</th>
                            <th>Estimated/Delivery Date</th>
                            <th><?php echo e(cleanLang(__('lang.status'))); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center"><?php echo e($project->project_id); ?></td>
                            <td class="txt-oflo"><a
                                    href="<?php echo e(_url('projects/'.$project->project_id)); ?>"><?php echo e(str_limit($project->project_title ??'---', 20)); ?></a>
                            </td>
                            <td><?php echo e(runtimeDate($project->project_date_start)); ?></td>
                            <td><?php echo e(runtimeDate($project->project_date_due)); ?></td>
                            <td><span class="text-success"><span
                                        class="label <?php echo e(runtimeProjectStatusColors($project->project_status, 'label')); ?>"><?php echo e(runtimeLang($project->project_status)); ?></span></span>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php /**PATH D:\Work\Philopino\public_html\public_html\application\resources\views/pages/home/client/widgets/second-row/projects.blade.php ENDPATH**/ ?>