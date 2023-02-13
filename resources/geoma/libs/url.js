const URL = {
  build: (path = '', params = []) => {
    if (params.length) {
      return `${URL.host}${path}/${params.join('/')}`;
    }

    return `${URL.host}${path}`;
  },
  __default: {
    method: 'GET',
    mode: 'cors',
    credentials: 'include',
    cache: 'no-cache',
  },
  host: '/api/',
};

export default URL;
