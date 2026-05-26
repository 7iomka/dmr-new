const { replaceLightDark } = require('./_selector-helpers.cjs');

module.exports = (atRule, ...params) => {
  replaceLightDark(atRule, '.dark', params.join(', '));
};
