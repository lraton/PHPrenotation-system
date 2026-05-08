import HandlePrenotation from './HandlePrenotation'
import Dashboard from './Dashboard'
import login from './login'
import logout from './logout'

const Controllers = {
    HandlePrenotation: Object.assign(HandlePrenotation, HandlePrenotation),
    Dashboard: Object.assign(Dashboard, Dashboard),
    login: Object.assign(login, login),
    logout: Object.assign(logout, logout),
}

export default Controllers