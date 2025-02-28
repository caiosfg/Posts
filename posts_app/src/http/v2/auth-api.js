import api from "./api"

export const csrfCookie = () => api.get('/sanctum/csrf-cookie')

const resource = "/auth"

export const login = (credentials) => api.post(`${resource}/login`, credentials)

export const register = (credentials) => api.post(`${resource}/register`, credentials)

export const logout = () => api.post(`${resource}/logout`)

export const getUser = () => api.get(`/user`)

