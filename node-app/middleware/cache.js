const NodeCache = require('node-cache');
const cache = new NodeCache({ stdTTL: 300, checkperiod: 120 });

function cacheMiddleware(keyFn) {
  return (req, res, next) => {
    const key = keyFn(req);
    const cached = cache.get(key);
    if (cached) {
      return res.json(cached);
    }
    res.locals.cacheKey = key;
    const originalJson = res.json.bind(res);
    res.json = (body) => {
      cache.set(key, body);
      return originalJson(body);
    };
    next();
  };
}

module.exports = { cacheMiddleware };
