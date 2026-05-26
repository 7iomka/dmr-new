const { replaceLightDark } = require('./_selector-helpers.cjs');

module.exports = (atRule, ...params) => {
  replaceLightDark(atRule, ':host-context(.dark)', params.join(', '));
};
