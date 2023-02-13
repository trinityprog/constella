const fetchHelper = function (URL, OPT) {
  return fetch(URL, OPT)
    .then((response) => {
      /** If not okey response */
      if (!response.ok) {
        throw Error(response.statusText);
      }
      return response.json();
    })
    .catch(err => Promise.reject(err));
};

export {
  fetchHelper,
};
