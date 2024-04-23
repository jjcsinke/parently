export const getPagination = (props) => {
    const {page, itemsPerPage: per_page} = props || {page: 1, itemsPerPage: 10};
    return {page, per_page};
}

export const shouldMakeRequest = (pagination, meta) => {
    return pagination.page !== meta.page || pagination.per_page !== meta.per_page;
}

export const responseData = (response) => {
    return response.data.data;
}
export const responsePagination = (response) => {
    const {current_page, per_page, total} = response.data.meta;
    return {page: current_page, per_page, total};
}
