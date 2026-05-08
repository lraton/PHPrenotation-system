import { queryParams, type RouteQueryOptions, type RouteDefinition, type RouteFormDefinition } from './../../../../wayfinder'
/**
* @see \App\Http\Controllers\Dashboard::addGiornata
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
export const addGiornata = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: addGiornata.url(options),
    method: 'post',
})

addGiornata.definition = {
    methods: ["post"],
    url: '/aggiungi-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::addGiornata
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
addGiornata.url = (options?: RouteQueryOptions) => {
    return addGiornata.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::addGiornata
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
addGiornata.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: addGiornata.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::addGiornata
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
const addGiornataForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: addGiornata.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::addGiornata
* @see app/Http/Controllers/Dashboard.php:38
* @route '/aggiungi-giornate'
*/
addGiornataForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: addGiornata.url(options),
    method: 'post',
})

addGiornata.form = addGiornataForm

/**
* @see \App\Http\Controllers\Dashboard::removeGiornata
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
export const removeGiornata = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeGiornata.url(options),
    method: 'post',
})

removeGiornata.definition = {
    methods: ["post"],
    url: '/rimuovi-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::removeGiornata
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
removeGiornata.url = (options?: RouteQueryOptions) => {
    return removeGiornata.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::removeGiornata
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
removeGiornata.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeGiornata.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeGiornata
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
const removeGiornataForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeGiornata.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeGiornata
* @see app/Http/Controllers/Dashboard.php:84
* @route '/rimuovi-giornate'
*/
removeGiornataForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeGiornata.url(options),
    method: 'post',
})

removeGiornata.form = removeGiornataForm

/**
* @see \App\Http\Controllers\Dashboard::removeAllGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
export const removeAllGiornate = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeAllGiornate.url(options),
    method: 'post',
})

removeAllGiornate.definition = {
    methods: ["post"],
    url: '/rimuovi-tutte-giornate',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::removeAllGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
removeAllGiornate.url = (options?: RouteQueryOptions) => {
    return removeAllGiornate.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::removeAllGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
removeAllGiornate.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeAllGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeAllGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
const removeAllGiornateForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeAllGiornate.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeAllGiornate
* @see app/Http/Controllers/Dashboard.php:110
* @route '/rimuovi-tutte-giornate'
*/
removeAllGiornateForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeAllGiornate.url(options),
    method: 'post',
})

removeAllGiornate.form = removeAllGiornateForm

/**
* @see \App\Http\Controllers\Dashboard::removeAllPrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
export const removeAllPrenotazioni = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeAllPrenotazioni.url(options),
    method: 'post',
})

removeAllPrenotazioni.definition = {
    methods: ["post"],
    url: '/rimuovi-tutte-prenotazioni',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::removeAllPrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
removeAllPrenotazioni.url = (options?: RouteQueryOptions) => {
    return removeAllPrenotazioni.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::removeAllPrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
removeAllPrenotazioni.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeAllPrenotazioni.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeAllPrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
const removeAllPrenotazioniForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeAllPrenotazioni.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeAllPrenotazioni
* @see app/Http/Controllers/Dashboard.php:120
* @route '/rimuovi-tutte-prenotazioni'
*/
removeAllPrenotazioniForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeAllPrenotazioni.url(options),
    method: 'post',
})

removeAllPrenotazioni.form = removeAllPrenotazioniForm

/**
* @see \App\Http\Controllers\Dashboard::removeAll
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
export const removeAll = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeAll.url(options),
    method: 'post',
})

removeAll.definition = {
    methods: ["post"],
    url: '/rimuovi-tutto',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::removeAll
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
removeAll.url = (options?: RouteQueryOptions) => {
    return removeAll.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::removeAll
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
removeAll.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removeAll.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeAll
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
const removeAllForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeAll.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removeAll
* @see app/Http/Controllers/Dashboard.php:167
* @route '/rimuovi-tutto'
*/
removeAllForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removeAll.url(options),
    method: 'post',
})

removeAll.form = removeAllForm

/**
* @see \App\Http\Controllers\Dashboard::exportCSV
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
export const exportCSV = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: exportCSV.url(options),
    method: 'post',
})

exportCSV.definition = {
    methods: ["post"],
    url: '/esporta-csv',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::exportCSV
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
exportCSV.url = (options?: RouteQueryOptions) => {
    return exportCSV.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::exportCSV
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
exportCSV.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: exportCSV.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::exportCSV
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
const exportCSVForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: exportCSV.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::exportCSV
* @see app/Http/Controllers/Dashboard.php:178
* @route '/esporta-csv'
*/
exportCSVForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: exportCSV.url(options),
    method: 'post',
})

exportCSV.form = exportCSVForm

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
export const tuttoDatabase = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: tuttoDatabase.url(options),
    method: 'get',
})

tuttoDatabase.definition = {
    methods: ["get","head"],
    url: '/tuttodatabase',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
tuttoDatabase.url = (options?: RouteQueryOptions) => {
    return tuttoDatabase.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
tuttoDatabase.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: tuttoDatabase.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
tuttoDatabase.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: tuttoDatabase.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
const tuttoDatabaseForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: tuttoDatabase.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
tuttoDatabaseForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: tuttoDatabase.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::tuttoDatabase
* @see app/Http/Controllers/Dashboard.php:225
* @route '/tuttodatabase'
*/
tuttoDatabaseForm.head = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: tuttoDatabase.url({
        [options?.mergeQuery ? 'mergeQuery' : 'query']: {
            _method: 'HEAD',
            ...(options?.query ?? options?.mergeQuery ?? {}),
        }
    }),
    method: 'get',
})

tuttoDatabase.form = tuttoDatabaseForm

/**
* @see \App\Http\Controllers\Dashboard::removePrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
export const removePrenotazione = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removePrenotazione.url(options),
    method: 'post',
})

removePrenotazione.definition = {
    methods: ["post"],
    url: '/rimuovi-prenotazione',
} satisfies RouteDefinition<["post"]>

/**
* @see \App\Http\Controllers\Dashboard::removePrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
removePrenotazione.url = (options?: RouteQueryOptions) => {
    return removePrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::removePrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
removePrenotazione.post = (options?: RouteQueryOptions): RouteDefinition<'post'> => ({
    url: removePrenotazione.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removePrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
const removePrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removePrenotazione.url(options),
    method: 'post',
})

/**
* @see \App\Http\Controllers\Dashboard::removePrenotazione
* @see app/Http/Controllers/Dashboard.php:143
* @route '/rimuovi-prenotazione'
*/
removePrenotazioneForm.post = (options?: RouteQueryOptions): RouteFormDefinition<'post'> => ({
    action: removePrenotazione.url(options),
    method: 'post',
})

removePrenotazione.form = removePrenotazioneForm

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:203
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
* @see app/Http/Controllers/Dashboard.php:203
* @route '/conferma-prenotazione'
*/
confermaPrenotazione.url = (options?: RouteQueryOptions) => {
    return confermaPrenotazione.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:203
* @route '/conferma-prenotazione'
*/
confermaPrenotazione.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: confermaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:203
* @route '/conferma-prenotazione'
*/
confermaPrenotazione.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: confermaPrenotazione.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:203
* @route '/conferma-prenotazione'
*/
const confermaPrenotazioneForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confermaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:203
* @route '/conferma-prenotazione'
*/
confermaPrenotazioneForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: confermaPrenotazione.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::confermaPrenotazione
* @see app/Http/Controllers/Dashboard.php:203
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
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
export const index = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

index.definition = {
    methods: ["get","head"],
    url: '/dashboard',
} satisfies RouteDefinition<["get","head"]>

/**
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
index.url = (options?: RouteQueryOptions) => {
    return index.definition.url + queryParams(options)
}

/**
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
index.get = (options?: RouteQueryOptions): RouteDefinition<'get'> => ({
    url: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
index.head = (options?: RouteQueryOptions): RouteDefinition<'head'> => ({
    url: index.url(options),
    method: 'head',
})

/**
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
const indexForm = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
*/
indexForm.get = (options?: RouteQueryOptions): RouteFormDefinition<'get'> => ({
    action: index.url(options),
    method: 'get',
})

/**
* @see \App\Http\Controllers\Dashboard::index
* @see app/Http/Controllers/Dashboard.php:27
* @route '/dashboard'
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

const Dashboard = { addGiornata, removeGiornata, removeAllGiornate, removeAllPrenotazioni, removeAll, exportCSV, tuttoDatabase, removePrenotazione, confermaPrenotazione, index }

export default Dashboard