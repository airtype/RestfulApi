<?php

return [

    /**
     * Dev Mode
     *
     * While in dev mode, the stack trace of errors are printed in the
     * json response body. By default, this `devMode` observes the default
     * setting of the `devMode` in Craft's general configuration.
     */
    'devMode' => \Craft\craft()->config->get('devMode'),

    /**
     * Api Route Prefix
     *
     * The Api Route Prefix acts as a namespace and is prepended to all
     * routes that the API plugin defines.
     */
    'apiRoutePrefix' => 'api',

    /**
     * Page Trigger
     *
     * The query string parametere for pagination. If the value is the same as
     * Craft's `pageTrigger`, an exception will be thrown.
     */
    'paginationParameter' => 'page',

    /**
     * Autoload
     *
     * Determine which directories should have thier files autoloaded.
     *
     * `true` loads the files in that directory across ALL plugins.
     * `false` loads the files in that directory only in the RestApi plugin.
     */
    'autoload' => [
        'transformers' => true,
        'validators'   => true,
    ],

    /**
     * Content Model Fields Location
     *
     * This is the key, in the body of $_POST or php://input, in which
     * content that will need to be added to the element's content
     * model.
     */
    'contentModelFieldsLocation' => 'fields',

    /**
     * Default Serializers
     *
     * A Serializer structures your Transformed data in certain ways.
     * For more info, see http://fractal.thephpleague.com/serializers/.
     */
    'defaultSerializer' => 'ArraySerializer',

    /**
     * Serializers
     *
     * Available serializers that can be specified as default serializers.
     */
    'serializers' => [
        'ArraySerializer'     => 'League\Fractal\Serializer\ArraySerializer',
        'DataArraySerializer' => 'League\Fractal\Serializer\DataArraySerializer',
        'JsonApiSerializer'   => 'League\Fractal\Serializer\JsonApiSerializer',
    ],

    /**
     * Default Auth
     *
     * The authentication method that should be applied to all requests. `null` will disable
     * authentication altogether.
     */
    'defaultAuth' => 'craft',

    /**
     * Auth
     *
     * Settings authentication methods
     */
    'auth' => [

        'basicAuth' => [
            'username' => '',
            'password' => '',
        ],

        'craft' => [
            'permissions' => [],
            'users'       => [],
            'groups'      => [],
        ],

    ],

    /**
     * Exception Transformer
     *
     * This transformer will be applied to all throw exceptions.
     */
    'exceptionTransformer' => 'RestApi\Transformers\ArrayTransformer',

    /**
     * Element Types
     *
     * Define settings for each element type. If no setting is defined for an element type,
     * the default settings defined in the `*` wildcard will be inherited.
     */
    'elementTypes' => [

        '*' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\ArrayTransformer',
            'validator'   => null,
            'permissions' => [
                'public'        => ['GET'],
                'authenticated' => ['POST', 'PUT', 'PATCH'],
            ],
        ],

        'Asset' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\AssetTransformer',
            'validator'   => 'RestApi\Validators\AssetValidator',
        ],

        'Category' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\CategoryTransformer',
            'validator'   => 'RestApi\Validators\CategoryValidator',
        ],

        'Entry' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\EntryTransformer',
            'validator'   => 'RestApi\Validators\EntryValidator',
        ],

        'GlobalSet' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\GlobalSetTransformer',
            'validator'   => 'RestApi\Validators\GlobalSetValidator',
        ],

        'MatrixBlock' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\MatrixBlockTransformer',
            'validator'   => 'RestApi\Validators\MatrixBlockValidator',
        ],

        'Tag' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\TagTransformer',
            'validator'   => 'RestApi\Validators\TagValidator',
        ],

        'User' => [
            'enabled'     => true,
            'transformer' => 'RestApi\Transformers\UserTransformer',
            'validator'   => 'RestApi\Validators\UserValidator',
        ],

    ],

];