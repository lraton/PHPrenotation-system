import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::index
* @see app/Http/Controllers/HandlePrenotation.php:28
* @route '/'
*/
indexForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

index.form = indexForm

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
export const selezione = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: selezione.url(options),
    method: 'get',
})

selezione.definition = {
    methods: ["get","head"],
    url: '/selezione',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
selezione.url = (options?: RouteQueryOptions) => {
    return selezione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
selezione.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: selezione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
selezione.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: selezione.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
const selezioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: selezione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
selezioneForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: selezione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::selezione
* @see app/Http/Controllers/HandlePrenotation.php:70
* @route '/selezione'
*/
selezioneForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: selezione.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

selezione.form = selezioneForm

/**
* @see \App\Http\Controllers\HandlePrenotation::prenota
* @see app/Http/Controllers/HandlePrenotation.php:96
* @route '/prenotazione'
*/
export const prenota = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: prenota.url(options),
    method: 'post',
})

prenota.definition = {
    methods: ["post"],
    url: '/prenotazione',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\HandlePrenotation::prenota
* @see app/Http/Controllers/HandlePrenotation.php:96
* @route '/prenotazione'
*/
prenota.url = (options?: RouteQueryOptions) => {
    return prenota.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HandlePrenotation::prenota
* @see app/Http/Controllers/HandlePrenotation.php:96
* @route '/prenotazione'
*/
prenota.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: prenota.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::prenota
* @see app/Http/Controllers/HandlePrenotation.php:96
* @route '/prenotazione'
*/
const prenotaForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: prenota.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::prenota
* @see app/Http/Controllers/HandlePrenotation.php:96
* @route '/prenotazione'
*/
prenotaForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: prenota.url(options),
    method: 'post',
})

prenota.form = prenotaForm

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
export const cancellaPrenotazione = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: cancellaPrenotazione.url(options),
    method: 'get',
})

cancellaPrenotazione.definition = {
    methods: ["get","head"],
    url: '/cancella-prenotazione',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
cancellaPrenotazione.url = (options?: RouteQueryOptions) => {
    return cancellaPrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
cancellaPrenotazione.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: cancellaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
cancellaPrenotazione.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: cancellaPrenotazione.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
const cancellaPrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: cancellaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
cancellaPrenotazioneForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: cancellaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:182
* @route '/cancella-prenotazione'
*/
cancellaPrenotazioneForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: cancellaPrenotazione.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

cancellaPrenotazione.form = cancellaPrenotazioneForm

const HandlePrenotation = { index, selezione, prenota, cancellaPrenotazione }

export default HandlePrenotation