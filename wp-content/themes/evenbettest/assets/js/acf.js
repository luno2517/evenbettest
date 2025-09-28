acf.add_filter('color_picker_args', function( args, $field ){
    args.palettes = [
        '#ffffff',
        '#3d0f58',
        '#7c37a1',
        '#e77bff',
        '#632784',
    ];
    args.defaultColor = '#3d0f58';

    return args;
});