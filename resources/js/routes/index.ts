import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../wayfinder'
/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
export const home = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: home.url(options),
    method: 'get',
})

home.definition = {
    methods: ["get","head"],
    url: '/',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
home.url = (options?: RouteQueryOptions) => {
    return home.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
home.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: home.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
home.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: home.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
const homeForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: home.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
homeForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: home.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::home
* @see app/Http/Controllers/HandlePrenotation.php:27
* @route '/'
*/
homeForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: home.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

home.form = homeForm

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:54
* @route '/aggiungi-giornate'
*/
export const aggiungiGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: aggiungiGiornate.url(options),
    method: 'post',
})

aggiungiGiornate.definition = {
    methods: ["post"],
    url: '/aggiungi-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:54
* @route '/aggiungi-giornate'
*/
aggiungiGiornate.url = (options?: RouteQueryOptions) => {
    return aggiungiGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:54
* @route '/aggiungi-giornate'
*/
aggiungiGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: aggiungiGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:54
* @route '/aggiungi-giornate'
*/
const aggiungiGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: aggiungiGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::aggiungiGiornate
* @see app/Http/Controllers/Dashboard.php:54
* @route '/aggiungi-giornate'
*/
aggiungiGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: aggiungiGiornate.url(options),
    method: 'post',
})

aggiungiGiornate.form = aggiungiGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:101
* @route '/rimuovi-giornate'
*/
export const rimuoviGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviGiornate.url(options),
    method: 'post',
})

rimuoviGiornate.definition = {
    methods: ["post"],
    url: '/rimuovi-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:101
* @route '/rimuovi-giornate'
*/
rimuoviGiornate.url = (options?: RouteQueryOptions) => {
    return rimuoviGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:101
* @route '/rimuovi-giornate'
*/
rimuoviGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:101
* @route '/rimuovi-giornate'
*/
const rimuoviGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviGiornate
* @see app/Http/Controllers/Dashboard.php:101
* @route '/rimuovi-giornate'
*/
rimuoviGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviGiornate.url(options),
    method: 'post',
})

rimuoviGiornate.form = rimuoviGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:141
* @route '/rimuovi-tutte-giornate'
*/
export const rimuoviTutteGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutteGiornate.url(options),
    method: 'post',
})

rimuoviTutteGiornate.definition = {
    methods: ["post"],
    url: '/rimuovi-tutte-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:141
* @route '/rimuovi-tutte-giornate'
*/
rimuoviTutteGiornate.url = (options?: RouteQueryOptions) => {
    return rimuoviTutteGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:141
* @route '/rimuovi-tutte-giornate'
*/
rimuoviTutteGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutteGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:141
* @route '/rimuovi-tutte-giornate'
*/
const rimuoviTutteGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutteGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutteGiornate
* @see app/Http/Controllers/Dashboard.php:141
* @route '/rimuovi-tutte-giornate'
*/
rimuoviTutteGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutteGiornate.url(options),
    method: 'post',
})

rimuoviTutteGiornate.form = rimuoviTutteGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:176
* @route '/rimuovi-prenotazione'
*/
export const rimuoviPrenotazione = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviPrenotazione.url(options),
    method: 'post',
})

rimuoviPrenotazione.definition = {
    methods: ["post"],
    url: '/rimuovi-prenotazione',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:176
* @route '/rimuovi-prenotazione'
*/
rimuoviPrenotazione.url = (options?: RouteQueryOptions) => {
    return rimuoviPrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:176
* @route '/rimuovi-prenotazione'
*/
rimuoviPrenotazione.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviPrenotazione.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:176
* @route '/rimuovi-prenotazione'
*/
const rimuoviPrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviPrenotazione.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviPrenotazione
* @see app/Http/Controllers/Dashboard.php:176
* @route '/rimuovi-prenotazione'
*/
rimuoviPrenotazioneForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviPrenotazione.url(options),
    method: 'post',
})

rimuoviPrenotazione.form = rimuoviPrenotazioneForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:152
* @route '/rimuovi-tutte-prenotazioni'
*/
export const rimuoviTuttePrenotazioni = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

rimuoviTuttePrenotazioni.definition = {
    methods: ["post"],
    url: '/rimuovi-tutte-prenotazioni',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:152
* @route '/rimuovi-tutte-prenotazioni'
*/
rimuoviTuttePrenotazioni.url = (options?: RouteQueryOptions) => {
    return rimuoviTuttePrenotazioni.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:152
* @route '/rimuovi-tutte-prenotazioni'
*/
rimuoviTuttePrenotazioni.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:152
* @route '/rimuovi-tutte-prenotazioni'
*/
const rimuoviTuttePrenotazioniForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTuttePrenotazioni
* @see app/Http/Controllers/Dashboard.php:152
* @route '/rimuovi-tutte-prenotazioni'
*/
rimuoviTuttePrenotazioniForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTuttePrenotazioni.url(options),
    method: 'post',
})

rimuoviTuttePrenotazioni.form = rimuoviTuttePrenotazioniForm

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:200
* @route '/rimuovi-tutto'
*/
export const rimuoviTutto = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutto.url(options),
    method: 'post',
})

rimuoviTutto.definition = {
    methods: ["post"],
    url: '/rimuovi-tutto',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:200
* @route '/rimuovi-tutto'
*/
rimuoviTutto.url = (options?: RouteQueryOptions) => {
    return rimuoviTutto.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:200
* @route '/rimuovi-tutto'
*/
rimuoviTutto.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: rimuoviTutto.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:200
* @route '/rimuovi-tutto'
*/
const rimuoviTuttoForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutto.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::rimuoviTutto
* @see app/Http/Controllers/Dashboard.php:200
* @route '/rimuovi-tutto'
*/
rimuoviTuttoForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: rimuoviTutto.url(options),
    method: 'post',
})

rimuoviTutto.form = rimuoviTuttoForm

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
export const esportaPdf = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: esportaPdf.url(options),
    method: 'get',
})

esportaPdf.definition = {
    methods: ["get","head"],
    url: '/esporta-pdf',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
esportaPdf.url = (options?: RouteQueryOptions) => {
    return esportaPdf.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
esportaPdf.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: esportaPdf.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
esportaPdf.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: esportaPdf.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
const esportaPdfForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: esportaPdf.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
esportaPdfForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: esportaPdf.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::esportaPdf
* @see app/Http/Controllers/Dashboard.php:212
* @route '/esporta-pdf'
*/
esportaPdfForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: esportaPdf.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

esportaPdf.form = esportaPdfForm

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:188
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
* @see app/Http/Controllers/HandlePrenotation.php:188
* @route '/cancella-prenotazione'
*/
cancellaPrenotazione.url = (options?: RouteQueryOptions) => {
    return cancellaPrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:188
* @route '/cancella-prenotazione'
*/
cancellaPrenotazione.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: cancellaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:188
* @route '/cancella-prenotazione'
*/
cancellaPrenotazione.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: cancellaPrenotazione.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:188
* @route '/cancella-prenotazione'
*/
const cancellaPrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: cancellaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:188
* @route '/cancella-prenotazione'
*/
cancellaPrenotazioneForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: cancellaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\HandlePrenotation::cancellaPrenotazione
* @see app/Http/Controllers/HandlePrenotation.php:188
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

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
export const confermaPrenotazione = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: confermaPrenotazione.url(options),
    method: 'get',
})

confermaPrenotazione.definition = {
    methods: ["get","head"],
    url: '/conferma-prenotazione',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
confermaPrenotazione.url = (options?: RouteQueryOptions) => {
    return confermaPrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
confermaPrenotazione.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: confermaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
confermaPrenotazione.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: confermaPrenotazione.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
const confermaPrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confermaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
confermaPrenotazioneForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confermaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:234
* @route '/conferma-prenotazione'
*/
confermaPrenotazioneForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confermaPrenotazione.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

confermaPrenotazione.form = confermaPrenotazioneForm

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
export const dashboard = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})

dashboard.definition = {
    methods: ["get","head"],
    url: '/dashboard',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
dashboard.url = (options?: RouteQueryOptions) => {
    return dashboard.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
dashboard.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: dashboard.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
dashboard.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: dashboard.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
const dashboardForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: dashboard.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
dashboardForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: dashboard.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::dashboard
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
dashboardForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: dashboard.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

dashboard.form = dashboardForm
