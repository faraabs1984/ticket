<?php if($customFields): ?>
    <?php $__currentLoopData = $customFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($customField->id == '1'): ?>
            <div class="col-lg-6">
                <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                    <label for="name" class="form-label"><?php echo e(__($customField->name)); ?></label>
                    <div class="form-icon-user">
                        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="name" name="name" placeholder="<?php echo e(__($customField->placeholder)); ?>" required="" value="<?php echo e(old('name')); ?>">
                        <div class="invalid-feedback d-block">
                            <?php echo e($errors->first('name')); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php elseif($customField->id == '2'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="email" class="form-label"><?php echo e(__($customField->name)); ?></label>
                <div class="form-icon-user">
                    <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="email" name="email" placeholder="<?php echo e(__($customField->placeholder)); ?>" required="" value="<?php echo e(old('email')); ?>">
                    <div class="invalid-feedback d-block">
                        <?php echo e($errors->first('email')); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php elseif($customField->id == '3'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="category" class="form-label"><?php echo e(__($customField->name)); ?></label>
                <select class="form-select" id="category" name="category" data-placeholder="<?php echo e(__($customField->placeholder)); ?>">
                    <option value=""><?php echo e(__($customField->placeholder)); ?></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if(old('category') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div class="invalid-feedback d-block">
                    <?php echo e($errors->first('category')); ?>

                </div>
            </div>
        </div>
        <?php elseif($customField->id == '4'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="subject" class="form-label"><?php echo e(__($customField->name)); ?></label>
                <div class="form-icon-user">
                    <input type="text" class="form-control <?php echo e($errors->has('subject') ? ' is-invalid' : ''); ?>" id="subject" name="subject" placeholder="<?php echo e(__($customField->placeholder)); ?>" required="" value="<?php echo e(old('subject')); ?>">
                    <div class="invalid-feedback d-block">
                        <?php echo e($errors->first('subject')); ?>

                    </div>
                </div>
            </div>
        </div>
        <?php elseif($customField->id == '5'): ?>
        <div class="col-lg-12">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label for="description" class="form-label"><?php echo e(__('Description')); ?></label>
                <textarea name="description" class="form-control ckdescription <?php echo e($errors->has('description') ? ' is-invalid' : ''); ?>" placeholder="<?php echo e(__($customField->placeholder)); ?>"><?php echo e(old('description')); ?></textarea>
                <div class="invalid-feedback">
                    <?php echo e($errors->first('description')); ?>

                </div>
            </div>
        </div>
        <?php elseif($customField->id == '6'): ?>
        <div class="col-lg-12">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <label class="form-label"><?php echo e(($customField->name)); ?> <small>(<?php echo e(($customField->placeholder)); ?>)</small></label>
                <div class="choose-file form-group">
                    <label for="file" class="form-label">
                        <div><?php echo e(__('Choose File Here')); ?></div>
                        <input type="file" class="form-control <?php echo e($errors->has('attachments.') ? 'is-invalid' : ''); ?>" multiple="" name="attachments[]" id="file" data-filename="multiple_file_selection">
                    </label>
                    <p class="multiple_file_selection"></p>
                </div>
            </div>
            <div class="invalid-feedback d-block">
                <?php echo e($errors->first('attachments.*')); ?>

            </div>
        </div>
        <?php elseif($customField->type == 'text'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3<?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::text('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::text('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'email'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::email('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::email('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'number'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::number('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::number('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'date'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::date('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::date('customField['.$customField->id.']', null, ['class' => 'form-control', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php elseif($customField->type == 'textarea'): ?>
        <div class="col-lg-6">
            <div class="form-group mb-3 <?php echo e($customField->width); ?>">
                <?php echo e(Form::label('customField-'.$customField->id, __($customField->name),['class'=>'form-label'])); ?>

                <?php if($customField->is_required == 1): ?>
                    <?php echo e(Form::textarea('customField['.$customField->id.']', null, ['class' => 'form-control ckdescription', 'placeholder' => __($customField->placeholder),'required'])); ?>

                <?php else: ?>
                    <?php echo e(Form::textarea('customField['.$customField->id.']', null, ['class' => 'form-control ckdescription', 'placeholder' => __($customField->placeholder)])); ?>

                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /var/www/ticket/resources/views/admin/customFields/formBuilder.blade.php ENDPATH**/ ?>