import api from "./api"


const resource = "/posts"


export const allPosts = () => api.get(resource)

export const createPosts = post => api.post(resource, post)

export const updatePosts = (id, post) => api.put(`${resource}/${id}`, post)

export const removePosts = id => api.delete(`${resource}/${id}`)

export const completePost = (id, post) => api.patch(`${resource}/${id}/admin`, post)
