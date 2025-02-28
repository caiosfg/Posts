import api from "./api"


const resource = "/opnions"


export const allOpnions = () => api.get(resource)

export const createOpnions = opnion => api.post(resource, opnion)

export const updateOpnions = (id, opnion) => api.put(`${resource}/${id}`, opnion)

export const removeOpnions = id => api.delete(`${resource}/${id}`)
