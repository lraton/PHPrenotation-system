import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\login::index
* @see app/Http/Controllers/login.php:14
* @route '/login'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: index.url(options),
    method: 'post',
})

index.definition = {
    methods: ["post"],
    url: '/login',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\login::index
* @see app/Http/Controllers/login.php:14
* @route '/login'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\login::index
* @see app/Http/Controllers/login.php:14
* @route '/login'
*/
index.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: index.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\login::index
* @see app/Http/Controllers/login.php:14
* @route '/login'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: index.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\login::index
* @see app/Http/Controllers/login.php:14
* @route '/login'
*/
indexForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: index.url(options),
    method: 'post',
})

index.form = indexForm

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
export const db = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: db.url(options),
    method: 'get',
})

db.definition = {
    methods: ["get","head"],
    url: '/crea-db',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
db.url = (options?: RouteQueryOptions) => {
    return db.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
db.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: db.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
db.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: db.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
const dbForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: db.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
dbForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: db.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\login::db
* @see app/Http/Controllers/login.php:64
* @route '/crea-db'
*/
dbForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: db.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

db.form = dbForm

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
export const signup = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: signup.url(options),
    method: 'get',
})

signup.definition = {
    methods: ["get","head"],
    url: '/signup',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
signup.url = (options?: RouteQueryOptions) => {
    return signup.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
signup.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: signup.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
signup.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: signup.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
const signupForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: signup.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
signupForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: signup.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\login::signup
* @see app/Http/Controllers/login.php:103
* @route '/signup'
*/
signupForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: signup.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

signup.form = signupForm

const login = { index, db, signup }

export default login