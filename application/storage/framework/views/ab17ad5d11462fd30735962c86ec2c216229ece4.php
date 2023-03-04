<?php if(auth()->user()->is_team && $task->assigned_to_me): ?>
<div class="x-section x-timer m-t-10" id="task-users-task-timer">
    <div class="x-title  text-left p-b-5">
        <h6 class=" m-b-0"><?php echo e(cleanLang(__('lang.my_timer'))); ?>

            <!--info tooltip-->
            <span class="info-tooltip">
                <span class="align-middle text-info font-16" data-toggle="tooltip"
                    title="<?php echo app('translator')->get('lang.this_is_total_logged_time_task'); ?>" data-placement="top">
                    <i class="ti-info-alt font-14"></i></span>
            </span></h6>
    </div>
    <span class="x-timer-time timers <?php echo e(runtimeTimerRunningStatus($task->timer_current_status)); ?>"
        id="task_timer_card_<?php echo e($task->task_id); ?>"><?php echo clean(runtimeSecondsHumanReadable($task->my_time, false)); ?></span>
    <?php if($task->task_status != 'completed'): ?>
    <!--start a timer-->
    <span
        class="x-timer-button js-timer-button js-ajax-request timer-start-button hidden <?php echo e(runtimeTimerVisibility($task->timer_current_status, 'stopped')); ?>"
        id="timer_button_start_card_<?php echo e($task->task_id); ?>" data-task-id="<?php echo e($task->task_id); ?>" data-location="table"
        data-url="<?php echo e(url('/')); ?>/tasks/timer/<?php echo e($task->task_id); ?>/start?source=card" data-form-id="tasks-list-table"
        data-type="form" data-progress-bar='hidden' data-ajax-type="POST">
        <span><i class="mdi mdi-play-circle"></i></span>
    </span>
    <!--stop a timer-->
    <span
        class="x-timer-button js-timer-button js-ajax-request timer-stop-button hidden <?php echo e(runtimeTimerVisibility($task->timer_current_status, 'running')); ?>"
        id="timer_button_stop_card_<?php echo e($task->task_id); ?>" data-task-id="<?php echo e($task->task_id); ?>" data-location="table"
        data-url="<?php echo e(url('/')); ?>/tasks/timer/<?php echo e($task->task_id); ?>/stop?source=card" data-form-id="tasks-list-table"
        data-type="form" data-progress-bar='hidden' data-ajax-type="POST">
        <span><i class="mdi mdi-stop-circle"></i></span>
    </span>
    <!--timer updating-->
    <input type="hidden" name="timers[<?php echo e($task->task_id); ?>]" value="">
    <?php endif; ?>

    <!--polling trigger-->
    <span class="hidden" id="timerTaskPollingTrigger" data-type="form" data-progress-bar='hidden'
        data-notifications="disabled" data-skip-checkboxes-reset="TRUE" data-form-id="task-users-task-timer"
        data-ajax-type="post" data-url="<?php echo e(url('/polling/timers?ref=task')); ?>"></span>
</div>
<?php endif; ?><?php /**PATH D:\Work\Philopino\public_html\public_html\application\resources\views/pages/task/components/timer.blade.php ENDPATH**/ ?>