<?php if (isset($component)) { $__componentOriginalb525200bfa976483b4eaa0b7685c6e24 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb525200bfa976483b4eaa0b7685c6e24 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-widgets::components.widget','data' => ['class' => 'fi-filament-info-widget']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-widgets::widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'fi-filament-info-widget']); ?>
    <?php if (isset($component)) { $__componentOriginalee08b1367eba38734199cf7829b1d1e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee08b1367eba38734199cf7829b1d1e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.section.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
        <div class="flex items-center gap-x-3">
            <div class="flex-1">
                <a
                    href="https://filamentphp.com"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    <svg
                        aria-label="Filament"
                        fill="currentColor"
                        role="img"
                        viewBox="0 0 303 61"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 text-gray-950 dark:text-white"
                    >
                        <path
                            d="M11.739 58.266c.598-2.782 1.17-5.473 1.716-8.073.455-2.167.964-4.568 1.527-7.204l.345-1.61 2.786-13.26h10.669l1.872-8.775H19.5l.351-1.736c.156-.767.286-1.41.39-1.93.416-2.002 1.17-3.504 2.262-4.505 1.092-1 2.6-1.501 4.524-1.501 1.092 0 2.171.13 3.237.39 1.066.26 2.08.624 3.042 1.092l2.808-9.36c-.832-.364-1.8-.683-2.905-.956a28.228 28.228 0 0 0-3.491-.623A31.515 31.515 0 0 0 26.052 0c-1.924 0-3.77.228-5.538.682a13.837 13.837 0 0 0-4.836 2.301c-1.456 1.08-2.724 2.542-3.803 4.388-1.079 1.846-1.904 4.147-2.476 6.903-.364 1.742-.76 3.633-1.19 5.675l.128-.605H1.872L0 28.119h6.474l-.095.447-.512 2.405-.251 1.185c-.416 1.962-.793 3.75-1.131 5.362l-.819 3.9c-.676 3.224-1.293 6.142-1.853 8.755a1037.9 1037.9 0 0 0-1.696 8.093h11.622Z"
                        />
                        <path
                            d="M11.739 58.266c.598-2.782 1.17-5.473 1.716-8.073.455-2.167.964-4.568 1.527-7.204l.345-1.61 2.786-13.26h10.669l1.872-8.775H19.5l.351-1.736c.156-.767.286-1.41.39-1.93.416-2.002 1.17-3.504 2.262-4.505 1.092-1 2.6-1.501 4.524-1.501 1.092 0 2.171.13 3.237.39 1.066.26 2.08.624 3.042 1.092l2.808-9.36c-.832-.364-1.8-.683-2.905-.956a28.228 28.228 0 0 0-3.491-.623A31.515 31.515 0 0 0 26.052 0c-1.924 0-3.77.228-5.538.682a13.837 13.837 0 0 0-4.836 2.301c-1.456 1.08-2.724 2.542-3.803 4.388-1.079 1.846-1.904 4.147-2.476 6.903-.364 1.742-.76 3.633-1.19 5.675l.128-.605H1.872L0 28.119h6.474l-.095.447-.512 2.405-.251 1.185c-.416 1.962-.793 3.75-1.131 5.362l-.819 3.9c-.676 3.224-1.293 6.142-1.853 8.755a1037.9 1037.9 0 0 0-1.696 8.093h11.622zm50.58 0a1959.83 1959.83 0 0 1 3.55-16.887l4.562-21.606c.754-3.588 1.476-7 2.165-10.237.689-3.237 1.358-6.39 2.008-9.458L62.748 1.092c-.65 3.12-1.3 6.227-1.95 9.321a896.385 896.385 0 0 1-2.028 9.399l-4.524 21.606c-.702 3.224-1.326 6.142-1.872 8.755-.546 2.613-1.118 5.311-1.716 8.093H62.32zM39.103 19.483l-.732 2.512-.019.108c-.042.364.111.725.398.918l4.02 2.702-4.7.305c-.37.024-.683.312-.773.71l-.358 1.58-.018.11c-.042.363.11.724.398.917l4.019 2.702-4.7.305c-.37.024-.682.312-.772.71l-.358 1.581-.019.11c-.042.362.111.724.398.917l4.019 2.701-4.7.306c-.369.024-.682.311-.772.71l-.358 1.58-.018.11c-.043.363.11.724.398.917l4.018 2.701-4.7.306c-.368.024-.681.312-.772.71l-.357 1.58-.02.11c-.041.363.112.724.399.917l4.02 2.701-4.7.306c-.37.024-.683.312-.773.71l-1.627 6.231h5.262l.82-3.391 6.593-.56c.369-.025.682-.313.772-.71l.358-1.582.018-.109c.043-.363-.11-.724-.397-.917l-4.02-2.703 4.7-.304c.37-.024.682-.312.773-.71l.358-1.581.018-.11c.042-.362-.11-.724-.398-.917l-4.019-2.702 4.7-.305c.369-.023.682-.311.772-.71l.358-1.58.019-.11c.042-.363-.111-.724-.398-.917l-4.02-2.702 4.7-.305c.37-.024.683-.312.773-.71l.358-1.58.018-.11c.043-.363-.11-.724-.398-.917l-4.02-2.703 4.701-.304c.37-.024.682-.312.772-.71l.358-1.581.019-.11c.042-.362-.111-.724-.398-.917l-5.325-3.61 1.136-2.821-5.804.215ZM46.303 13.338c2.184 0 4.01-.396 5.48-1.19 1.468-.793 2.437-2.32 2.905-4.582.416-1.976.104-3.672-.936-5.09C52.712 1.06 51.113.352 48.955.352s-3.985.455-5.48 1.365c-1.495.91-2.463 2.405-2.905 4.485-.468 2.288-.163 4.05.916 5.285 1.08 1.234 2.685 1.852 4.817 1.852zm48.448 4.953c3.744 0 6.825.624 9.243 1.872 2.418 1.248 4.095 3.023 5.031 5.323.936 2.302 1.053 5.038.351 8.21-.26 1.3-.533 2.62-.819 3.959l-.897 4.192-.702 3.276c-.416 1.95-.851 4.004-1.306 6.162a948.634 948.634 0 0 1-1.502 6.981H94.088l.507-5.187h-.897c-.962 1.378-2.021 2.515-3.178 3.413a12.74 12.74 0 0 1-3.764 2.028c-1.352.454-2.808.682-4.368.682-2.47 0-4.537-.605-6.2-1.813-1.665-1.21-2.822-2.815-3.472-4.817-.65-2.002-.715-4.186-.195-6.552.39-1.82 1.02-3.341 1.892-4.563a11.194 11.194 0 0 1 3.159-3.003c1.235-.78 2.6-1.398 4.095-1.852a31.55 31.55 0 0 1 4.66-1.034l12.207-1.911c.26-1.17.163-2.19-.292-3.061-.455-.872-1.268-1.547-2.438-2.029-1.17-.48-2.665-.721-4.485-.721-.936 0-1.93.072-2.983.215a33.843 33.843 0 0 0-3.296.623c-1.144.273-2.32.611-3.53 1.014-1.208.404-2.45.878-3.724 1.424l1.833-10.218a43.732 43.732 0 0 1 3.198-.916 75.564 75.564 0 0 1 3.783-.839 50.322 50.322 0 0 1 4.076-.624 36.562 36.562 0 0 1 4.075-.234zm2.34 20.631c-.364.26-.806.514-1.326.76-.52.247-1.235.494-2.145.741-.91.247-2.145.54-3.705.878a21.975 21.975 0 0 0-2.769.819c-.832.312-1.52.754-2.067 1.326-.546.572-.91 1.313-1.092 2.223-.26 1.43-.013 2.542.741 3.335.754.793 1.781 1.189 3.081 1.189.936 0 1.879-.201 2.828-.604.949-.404 1.859-.982 2.73-1.736a14.629 14.629 0 0 0 2.398-2.691zm56.696-13.686c-.41-1.957-1.242-3.518-2.498-4.683-1.625-1.508-3.893-2.262-6.805-2.262-1.794 0-3.517.312-5.168.936a17.493 17.493 0 0 0-4.563 2.555c-1.39 1.078-2.567 2.281-3.53 3.607h-.974l.819-6.63-9.828.585c-.676 3.25-1.34 6.39-1.99 9.418a858.45 858.45 0 0 0-1.832 8.756l-.82 3.9c-.701 3.224-1.325 6.142-1.871 8.755-.546 2.613-1.118 5.311-1.716 8.093h11.66c.573-2.782 1.132-5.46 1.678-8.034.546-2.574 1.13-5.317 1.755-8.229l1.677-8.073a27.92 27.92 0 0 1 2.515-2.574 11.36 11.36 0 0 1 2.652-1.794 6.731 6.731 0 0 1 2.945-.663c1.82 0 2.983.709 3.49 2.125.507 1.417.514 3.296.02 5.636l-1.131 5.382a858.89 858.89 0 0 0-1.716 8.19 966.047 966.047 0 0 1-1.677 8.034H148.5c.598-2.782 1.176-5.48 1.735-8.093.56-2.613 1.177-5.531 1.853-8.755.312-1.508.617-2.964.916-4.368l.8-3.744-.055.254.082-.09a29.133 29.133 0 0 1 1.69-1.69l.428-.385a12.286 12.286 0 0 1 2.671-1.814 6.572 6.572 0 0 1 2.945-.682c1.82 0 2.983.709 3.49 2.125.507 1.417.514 3.296.02 5.636l-1.131 5.382c-.598 2.938-1.164 5.675-1.697 8.21-.533 2.534-1.098 5.206-1.696 8.014h11.66a1578.075 1578.075 0 0 1 3.549-16.848c.313-1.508.618-2.964.917-4.368l.8-3.744c.988-4.55.676-8.19-.936-10.92-1.612-2.73-4.407-4.095-8.385-4.095-1.794 0-3.523.319-5.187.956a18.181 18.181 0 0 0-4.622 2.593 18.554 18.554 0 0 0-3.646 3.705h-.855l-.06-.309zm50.415-6.945c4.082 0 7.41.741 9.984 2.223 2.574 1.482 4.316 3.562 5.226 6.24.91 2.678.923 5.798.04 9.36a53.053 53.053 0 0 1-.644 2.418 33.67 33.67 0 0 1-.53 1.653l-.192.531h-23.875l-.008.154c-.055 1.488.165 2.782.659 3.883.74 1.65 1.97 2.886 3.685 3.705 1.716.819 3.822 1.228 6.318 1.228 1.092 0 2.308-.097 3.647-.292a27.224 27.224 0 0 0 3.997-.898 18.584 18.584 0 0 0 3.666-1.54l-1.56 9.906c-.702.416-1.664.806-2.886 1.17-1.222.364-2.632.663-4.231.897a35.747 35.747 0 0 1-5.168.351c-4.68 0-8.586-.904-11.72-2.71-3.132-1.807-5.342-4.375-6.63-7.703-1.286-3.328-1.462-7.28-.526-11.856.78-3.77 2.106-7.059 3.978-9.867 1.872-2.808 4.225-4.985 7.06-6.532 2.833-1.547 6.07-2.321 9.71-2.321zm.234 8.229c-1.326 0-2.62.351-3.88 1.053-1.261.702-2.386 1.794-3.374 3.276-.592.89-1.101 1.933-1.525 3.13l-.117.343 14.094-.294.044-.335c.193-1.711-.059-3.244-.757-4.599-.884-1.716-2.379-2.574-4.485-2.574zm29.383 31.746c.572-2.782 1.13-5.453 1.677-8.014l1.755-8.249 1.677-8.073a25.182 25.182 0 0 1 2.554-2.574 11.767 11.767 0 0 1 2.73-1.794c.95-.442 1.983-.663 3.1-.663 2.055 0 3.355.709 3.9 2.125.547 1.417.56 3.296.04 5.636l-1.131 5.382a2287.206 2287.206 0 0 1-3.393 16.224h11.66c.599-2.782 1.177-5.48 1.736-8.093a763.396 763.396 0 0 0 1.814-8.755c.338-1.508.656-2.964.955-4.368l.8-3.744c.962-4.55.624-8.19-1.014-10.92-1.638-2.73-4.563-4.095-8.775-4.095-1.846 0-3.62.312-5.324.936a17.45 17.45 0 0 0-4.66 2.555c-1.404 1.078-2.587 2.281-3.55 3.607h-.974l.819-6.63-9.828.585c-.676 3.25-1.34 6.396-1.99 9.438-.65 3.042-1.26 5.954-1.832 8.736l-.82 3.9a4169.42 4169.42 0 0 1-3.588 16.848h11.662zm51.582 1.053c.936 0 1.95-.085 3.042-.254a24.8 24.8 0 0 0 3.062-.662c.949-.273 1.696-.592 2.242-.956l1.248-9.555c-1.014.702-2.021 1.196-3.022 1.482-1.001.286-1.918.429-2.75.429-1.898 0-3.191-.65-3.88-1.95-.69-1.3-.76-3.198-.215-5.694l2.946-14.04h11.601l1.872-8.775H289.93l.078-.366c.169-.787.33-1.548.486-2.282l.153-.726c.403-1.91.8-3.77 1.19-5.577.39-1.807.792-3.724 1.208-5.752l-11.934 2.067c-.546 2.574-1.072 5.07-1.58 7.488-.303 1.45-.633 3-.989 4.647l-.108.501h-6.293l-1.872 8.775h6.313l-.049.236-.14.68c-.417 2.015-.813 3.9-1.19 5.655a795.333 795.333 0 0 0-1.073 5.07 719.362 719.362 0 0 1-1.053 4.973c-.702 3.302-.624 6.032.234 8.19.858 2.158 2.334 3.764 4.427 4.816 2.093 1.053 4.647 1.58 7.663 1.58z"
                        />
                    </svg>
                </a>

                <p class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                    <?php echo e(\Composer\InstalledVersions::getPrettyVersion('filament/filament')); ?>

                </p>
            </div>

            <div class="flex flex-col items-end gap-y-1">
                <?php if (isset($component)) { $__componentOriginal549c94d872270b69c72bdf48cb183bc9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal549c94d872270b69c72bdf48cb183bc9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.link','data' => ['color' => 'gray','href' => 'https://filamentphp.com/docs','icon' => 'heroicon-m-book-open','iconAlias' => 'panels::widgets.filament-info.open-documentation-button','rel' => 'noopener noreferrer','target' => '_blank']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','href' => 'https://filamentphp.com/docs','icon' => 'heroicon-m-book-open','icon-alias' => 'panels::widgets.filament-info.open-documentation-button','rel' => 'noopener noreferrer','target' => '_blank']); ?>
                    <?php echo e(__('filament-panels::widgets/filament-info-widget.actions.open_documentation.label')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal549c94d872270b69c72bdf48cb183bc9)): ?>
<?php $attributes = $__attributesOriginal549c94d872270b69c72bdf48cb183bc9; ?>
<?php unset($__attributesOriginal549c94d872270b69c72bdf48cb183bc9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal549c94d872270b69c72bdf48cb183bc9)): ?>
<?php $component = $__componentOriginal549c94d872270b69c72bdf48cb183bc9; ?>
<?php unset($__componentOriginal549c94d872270b69c72bdf48cb183bc9); ?>
<?php endif; ?>

                <?php if (isset($component)) { $__componentOriginal549c94d872270b69c72bdf48cb183bc9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal549c94d872270b69c72bdf48cb183bc9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.link','data' => ['color' => 'gray','href' => 'https://github.com/filamentphp/filament','iconAlias' => 'panels::widgets.filament-info.open-github-button','rel' => 'noopener noreferrer','target' => '_blank']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['color' => 'gray','href' => 'https://github.com/filamentphp/filament','icon-alias' => 'panels::widgets.filament-info.open-github-button','rel' => 'noopener noreferrer','target' => '_blank']); ?>
                     <?php $__env->slot('icon', null, []); ?> 
                        <svg
                            viewBox="0 0 98 96"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                clip-rule="evenodd"
                                fill="currentColor"
                                fill-rule="evenodd"
                                d="M48.854 0C21.839 0 0 22 0 49.217c0 21.756 13.993 40.172 33.405 46.69 2.427.49 3.316-1.059 3.316-2.362 0-1.141-.08-5.052-.08-9.127-13.59 2.934-16.42-5.867-16.42-5.867-2.184-5.704-5.42-7.17-5.42-7.17-4.448-3.015.324-3.015.324-3.015 4.934.326 7.523 5.052 7.523 5.052 4.367 7.496 11.404 5.378 14.235 4.074.404-3.178 1.699-5.378 3.074-6.6-10.839-1.141-22.243-5.378-22.243-24.283 0-5.378 1.94-9.778 5.014-13.2-.485-1.222-2.184-6.275.486-13.038 0 0 4.125-1.304 13.426 5.052a46.97 46.97 0 0 1 12.214-1.63c4.125 0 8.33.571 12.213 1.63 9.302-6.356 13.427-5.052 13.427-5.052 2.67 6.763.97 11.816.485 13.038 3.155 3.422 5.015 7.822 5.015 13.2 0 18.905-11.404 23.06-22.324 24.283 1.78 1.548 3.316 4.481 3.316 9.126 0 6.6-.08 11.897-.08 13.526 0 1.304.89 2.853 3.316 2.364 19.412-6.52 33.405-24.935 33.405-46.691C97.707 22 75.788 0 48.854 0z"
                            />
                        </svg>
                     <?php $__env->endSlot(); ?>

                    <?php echo e(__('filament-panels::widgets/filament-info-widget.actions.open_github.label')); ?>

                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal549c94d872270b69c72bdf48cb183bc9)): ?>
<?php $attributes = $__attributesOriginal549c94d872270b69c72bdf48cb183bc9; ?>
<?php unset($__attributesOriginal549c94d872270b69c72bdf48cb183bc9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal549c94d872270b69c72bdf48cb183bc9)): ?>
<?php $component = $__componentOriginal549c94d872270b69c72bdf48cb183bc9; ?>
<?php unset($__componentOriginal549c94d872270b69c72bdf48cb183bc9); ?>
<?php endif; ?>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee08b1367eba38734199cf7829b1d1e9)): ?>
<?php $attributes = $__attributesOriginalee08b1367eba38734199cf7829b1d1e9; ?>
<?php unset($__attributesOriginalee08b1367eba38734199cf7829b1d1e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee08b1367eba38734199cf7829b1d1e9)): ?>
<?php $component = $__componentOriginalee08b1367eba38734199cf7829b1d1e9; ?>
<?php unset($__componentOriginalee08b1367eba38734199cf7829b1d1e9); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb525200bfa976483b4eaa0b7685c6e24)): ?>
<?php $attributes = $__attributesOriginalb525200bfa976483b4eaa0b7685c6e24; ?>
<?php unset($__attributesOriginalb525200bfa976483b4eaa0b7685c6e24); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb525200bfa976483b4eaa0b7685c6e24)): ?>
<?php $component = $__componentOriginalb525200bfa976483b4eaa0b7685c6e24; ?>
<?php unset($__componentOriginalb525200bfa976483b4eaa0b7685c6e24); ?>
<?php endif; ?>
<?php /**PATH /home/osama/Downloads/EduBridge-main/back-end/vendor/filament/filament/src/../resources/views/widgets/filament-info-widget.blade.php ENDPATH**/ ?>