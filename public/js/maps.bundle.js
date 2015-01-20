!function e(t,n,r){function o(a,s){if(!n[a]){if(!t[a]){var u="function"==typeof require&&require;if(!s&&u)return u(a,!0);if(i)return i(a,!0);throw new Error("Cannot find module '"+a+"'")}var f=n[a]={exports:{}};t[a][0].call(f.exports,function(e){var n=t[a][1][e];return o(n?n:e)},f,f.exports,e,t,n,r)}return n[a].exports}for(var i="function"==typeof require&&require,a=0;a<r.length;a++)o(r[a]);return o}({1:[function(e,t,n){(function(t,r,o){function o(e,t,n){if(!(this instanceof o))return new o(e,t,n);var r=typeof e;if("base64"===t&&"string"===r)for(e=k(e);e.length%4!==0;)e+="=";var i;if("number"===r)i=T(e);else if("string"===r)i=o.byteLength(e,t);else{if("object"!==r)throw new Error("First argument needs to be a number, array or string.");i=T(e.length)}var a;o._useTypedArrays?a=o._augment(new Uint8Array(i)):(a=this,a.length=i,a._isBuffer=!0);var s;if(o._useTypedArrays&&"number"==typeof e.byteLength)a._set(e);else if(j(e))for(s=0;i>s;s++)a[s]=o.isBuffer(e)?e.readUInt8(s):e[s];else if("string"===r)a.write(e,0,t);else if("number"===r&&!o._useTypedArrays&&!n)for(s=0;i>s;s++)a[s]=0;return a}function i(e,t,n,r){n=Number(n)||0;var i=e.length-n;r?(r=Number(r),r>i&&(r=i)):r=i;var a=t.length;P(a%2===0,"Invalid hex string"),r>a/2&&(r=a/2);for(var s=0;r>s;s++){var u=parseInt(t.substr(2*s,2),16);P(!isNaN(u),"Invalid hex string"),e[n+s]=u}return o._charsWritten=2*s,s}function a(e,t,n,r){var i=o._charsWritten=$(D(t),e,n,r);return i}function s(e,t,n,r){var i=o._charsWritten=$(F(t),e,n,r);return i}function u(e,t,n,r){return s(e,t,n,r)}function f(e,t,n,r){var i=o._charsWritten=$(Z(t),e,n,r);return i}function l(e,t,n,r){var i=o._charsWritten=$(N(t),e,n,r);return i}function d(e,t,n){return R.fromByteArray(0===t&&n===e.length?e:e.slice(t,n))}function c(e,t,n){var r="",o="";n=Math.min(e.length,n);for(var i=t;n>i;i++)e[i]<=127?(r+=W(o)+String.fromCharCode(e[i]),o=""):o+="%"+e[i].toString(16);return r+W(o)}function h(e,t,n){var r="";n=Math.min(e.length,n);for(var o=t;n>o;o++)r+=String.fromCharCode(e[o]);return r}function g(e,t,n){return h(e,t,n)}function p(e,t,n){var r=e.length;(!t||0>t)&&(t=0),(!n||0>n||n>r)&&(n=r);for(var o="",i=t;n>i;i++)o+=M(e[i]);return o}function y(e,t,n){for(var r=e.slice(t,n),o="",i=0;i<r.length;i+=2)o+=String.fromCharCode(r[i]+256*r[i+1]);return o}function w(e,t,n,r){r||(P("boolean"==typeof n,"missing or invalid endian"),P(void 0!==t&&null!==t,"missing offset"),P(t+1<e.length,"Trying to read beyond buffer length"));var o=e.length;if(!(t>=o)){var i;return n?(i=e[t],o>t+1&&(i|=e[t+1]<<8)):(i=e[t]<<8,o>t+1&&(i|=e[t+1])),i}}function b(e,t,n,r){r||(P("boolean"==typeof n,"missing or invalid endian"),P(void 0!==t&&null!==t,"missing offset"),P(t+3<e.length,"Trying to read beyond buffer length"));var o=e.length;if(!(t>=o)){var i;return n?(o>t+2&&(i=e[t+2]<<16),o>t+1&&(i|=e[t+1]<<8),i|=e[t],o>t+3&&(i+=e[t+3]<<24>>>0)):(o>t+1&&(i=e[t+1]<<16),o>t+2&&(i|=e[t+2]<<8),o>t+3&&(i|=e[t+3]),i+=e[t]<<24>>>0),i}}function v(e,t,n,r){r||(P("boolean"==typeof n,"missing or invalid endian"),P(void 0!==t&&null!==t,"missing offset"),P(t+1<e.length,"Trying to read beyond buffer length"));var o=e.length;if(!(t>=o)){var i=w(e,t,n,!0),a=32768&i;return a?-1*(65535-i+1):i}}function m(e,t,n,r){r||(P("boolean"==typeof n,"missing or invalid endian"),P(void 0!==t&&null!==t,"missing offset"),P(t+3<e.length,"Trying to read beyond buffer length"));var o=e.length;if(!(t>=o)){var i=b(e,t,n,!0),a=2147483648&i;return a?-1*(4294967295-i+1):i}}function E(e,t,n,r){return r||(P("boolean"==typeof n,"missing or invalid endian"),P(t+3<e.length,"Trying to read beyond buffer length")),X.read(e,t,n,23,4)}function I(e,t,n,r){return r||(P("boolean"==typeof n,"missing or invalid endian"),P(t+7<e.length,"Trying to read beyond buffer length")),X.read(e,t,n,52,8)}function B(e,t,n,r,o){o||(P(void 0!==t&&null!==t,"missing value"),P("boolean"==typeof r,"missing or invalid endian"),P(void 0!==n&&null!==n,"missing offset"),P(n+1<e.length,"trying to write beyond buffer length"),q(t,65535));var i=e.length;if(!(n>=i))for(var a=0,s=Math.min(i-n,2);s>a;a++)e[n+a]=(t&255<<8*(r?a:1-a))>>>8*(r?a:1-a)}function A(e,t,n,r,o){o||(P(void 0!==t&&null!==t,"missing value"),P("boolean"==typeof r,"missing or invalid endian"),P(void 0!==n&&null!==n,"missing offset"),P(n+3<e.length,"trying to write beyond buffer length"),q(t,4294967295));var i=e.length;if(!(n>=i))for(var a=0,s=Math.min(i-n,4);s>a;a++)e[n+a]=t>>>8*(r?a:3-a)&255}function _(e,t,n,r,o){o||(P(void 0!==t&&null!==t,"missing value"),P("boolean"==typeof r,"missing or invalid endian"),P(void 0!==n&&null!==n,"missing offset"),P(n+1<e.length,"Trying to write beyond buffer length"),O(t,32767,-32768));var i=e.length;n>=i||(t>=0?B(e,t,n,r,o):B(e,65535+t+1,n,r,o))}function L(e,t,n,r,o){o||(P(void 0!==t&&null!==t,"missing value"),P("boolean"==typeof r,"missing or invalid endian"),P(void 0!==n&&null!==n,"missing offset"),P(n+3<e.length,"Trying to write beyond buffer length"),O(t,2147483647,-2147483648));var i=e.length;n>=i||(t>=0?A(e,t,n,r,o):A(e,4294967295+t+1,n,r,o))}function U(e,t,n,r,o){o||(P(void 0!==t&&null!==t,"missing value"),P("boolean"==typeof r,"missing or invalid endian"),P(void 0!==n&&null!==n,"missing offset"),P(n+3<e.length,"Trying to write beyond buffer length"),J(t,3.4028234663852886e38,-3.4028234663852886e38));var i=e.length;n>=i||X.write(e,t,n,r,23,4)}function x(e,t,n,r,o){o||(P(void 0!==t&&null!==t,"missing value"),P("boolean"==typeof r,"missing or invalid endian"),P(void 0!==n&&null!==n,"missing offset"),P(n+7<e.length,"Trying to write beyond buffer length"),J(t,1.7976931348623157e308,-1.7976931348623157e308));var i=e.length;n>=i||X.write(e,t,n,r,52,8)}function k(e){return e.trim?e.trim():e.replace(/^\s+|\s+$/g,"")}function C(e,t,n){return"number"!=typeof e?n:(e=~~e,e>=t?t:e>=0?e:(e+=t,e>=0?e:0))}function T(e){return e=~~Math.ceil(+e),0>e?0:e}function S(e){return(Array.isArray||function(e){return"[object Array]"===Object.prototype.toString.call(e)})(e)}function j(e){return S(e)||o.isBuffer(e)||e&&"object"==typeof e&&"number"==typeof e.length}function M(e){return 16>e?"0"+e.toString(16):e.toString(16)}function D(e){for(var t=[],n=0;n<e.length;n++){var r=e.charCodeAt(n);if(127>=r)t.push(e.charCodeAt(n));else{var o=n;r>=55296&&57343>=r&&n++;for(var i=encodeURIComponent(e.slice(o,n+1)).substr(1).split("%"),a=0;a<i.length;a++)t.push(parseInt(i[a],16))}}return t}function F(e){for(var t=[],n=0;n<e.length;n++)t.push(255&e.charCodeAt(n));return t}function N(e){for(var t,n,r,o=[],i=0;i<e.length;i++)t=e.charCodeAt(i),n=t>>8,r=t%256,o.push(r),o.push(n);return o}function Z(e){return R.toByteArray(e)}function $(e,t,n,r){for(var o=0;r>o&&!(o+n>=t.length||o>=e.length);o++)t[o+n]=e[o];return o}function W(e){try{return decodeURIComponent(e)}catch(t){return String.fromCharCode(65533)}}function q(e,t){P("number"==typeof e,"cannot write a non-number as a number"),P(e>=0,"specified a negative value for writing an unsigned value"),P(t>=e,"value is larger than maximum value for type"),P(Math.floor(e)===e,"value has a fractional component")}function O(e,t,n){P("number"==typeof e,"cannot write a non-number as a number"),P(t>=e,"value larger than maximum allowed value"),P(e>=n,"value smaller than minimum allowed value"),P(Math.floor(e)===e,"value has a fractional component")}function J(e,t,n){P("number"==typeof e,"cannot write a non-number as a number"),P(t>=e,"value larger than maximum allowed value"),P(e>=n,"value smaller than minimum allowed value")}function P(e,t){if(!e)throw new Error(t||"Failed assertion")}var R=e("base64-js"),X=e("ieee754");n.Buffer=o,n.SlowBuffer=o,n.INSPECT_MAX_BYTES=50,o.poolSize=8192,o._useTypedArrays=function(){try{var e=new ArrayBuffer(0),t=new Uint8Array(e);return t.foo=function(){return 42},42===t.foo()&&"function"==typeof t.subarray}catch(n){return!1}}(),o.isEncoding=function(e){switch(String(e).toLowerCase()){case"hex":case"utf8":case"utf-8":case"ascii":case"binary":case"base64":case"raw":case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":return!0;default:return!1}},o.isBuffer=function(e){return!(null===e||void 0===e||!e._isBuffer)},o.byteLength=function(e,t){var n;switch(e+="",t||"utf8"){case"hex":n=e.length/2;break;case"utf8":case"utf-8":n=D(e).length;break;case"ascii":case"binary":case"raw":n=e.length;break;case"base64":n=Z(e).length;break;case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":n=2*e.length;break;default:throw new Error("Unknown encoding")}return n},o.concat=function(e,t){if(P(S(e),"Usage: Buffer.concat(list, [totalLength])\nlist should be an Array."),0===e.length)return new o(0);if(1===e.length)return e[0];var n;if("number"!=typeof t)for(t=0,n=0;n<e.length;n++)t+=e[n].length;var r=new o(t),i=0;for(n=0;n<e.length;n++){var a=e[n];a.copy(r,i),i+=a.length}return r},o.prototype.write=function(e,t,n,r){if(isFinite(t))isFinite(n)||(r=n,n=void 0);else{var o=r;r=t,t=n,n=o}t=Number(t)||0;var d=this.length-t;n?(n=Number(n),n>d&&(n=d)):n=d,r=String(r||"utf8").toLowerCase();var c;switch(r){case"hex":c=i(this,e,t,n);break;case"utf8":case"utf-8":c=a(this,e,t,n);break;case"ascii":c=s(this,e,t,n);break;case"binary":c=u(this,e,t,n);break;case"base64":c=f(this,e,t,n);break;case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":c=l(this,e,t,n);break;default:throw new Error("Unknown encoding")}return c},o.prototype.toString=function(e,t,n){var r=this;if(e=String(e||"utf8").toLowerCase(),t=Number(t)||0,n=void 0!==n?Number(n):n=r.length,n===t)return"";var o;switch(e){case"hex":o=p(r,t,n);break;case"utf8":case"utf-8":o=c(r,t,n);break;case"ascii":o=h(r,t,n);break;case"binary":o=g(r,t,n);break;case"base64":o=d(r,t,n);break;case"ucs2":case"ucs-2":case"utf16le":case"utf-16le":o=y(r,t,n);break;default:throw new Error("Unknown encoding")}return o},o.prototype.toJSON=function(){return{type:"Buffer",data:Array.prototype.slice.call(this._arr||this,0)}},o.prototype.copy=function(e,t,n,r){var i=this;if(n||(n=0),r||0===r||(r=this.length),t||(t=0),r!==n&&0!==e.length&&0!==i.length){P(r>=n,"sourceEnd < sourceStart"),P(t>=0&&t<e.length,"targetStart out of bounds"),P(n>=0&&n<i.length,"sourceStart out of bounds"),P(r>=0&&r<=i.length,"sourceEnd out of bounds"),r>this.length&&(r=this.length),e.length-t<r-n&&(r=e.length-t+n);var a=r-n;if(100>a||!o._useTypedArrays)for(var s=0;a>s;s++)e[s+t]=this[s+n];else e._set(this.subarray(n,n+a),t)}},o.prototype.slice=function(e,t){var n=this.length;if(e=C(e,n,0),t=C(t,n,n),o._useTypedArrays)return o._augment(this.subarray(e,t));for(var r=t-e,i=new o(r,void 0,!0),a=0;r>a;a++)i[a]=this[a+e];return i},o.prototype.get=function(e){return console.log(".get() is deprecated. Access using array indexes instead."),this.readUInt8(e)},o.prototype.set=function(e,t){return console.log(".set() is deprecated. Access using array indexes instead."),this.writeUInt8(e,t)},o.prototype.readUInt8=function(e,t){return t||(P(void 0!==e&&null!==e,"missing offset"),P(e<this.length,"Trying to read beyond buffer length")),e>=this.length?void 0:this[e]},o.prototype.readUInt16LE=function(e,t){return w(this,e,!0,t)},o.prototype.readUInt16BE=function(e,t){return w(this,e,!1,t)},o.prototype.readUInt32LE=function(e,t){return b(this,e,!0,t)},o.prototype.readUInt32BE=function(e,t){return b(this,e,!1,t)},o.prototype.readInt8=function(e,t){if(t||(P(void 0!==e&&null!==e,"missing offset"),P(e<this.length,"Trying to read beyond buffer length")),!(e>=this.length)){var n=128&this[e];return n?-1*(255-this[e]+1):this[e]}},o.prototype.readInt16LE=function(e,t){return v(this,e,!0,t)},o.prototype.readInt16BE=function(e,t){return v(this,e,!1,t)},o.prototype.readInt32LE=function(e,t){return m(this,e,!0,t)},o.prototype.readInt32BE=function(e,t){return m(this,e,!1,t)},o.prototype.readFloatLE=function(e,t){return E(this,e,!0,t)},o.prototype.readFloatBE=function(e,t){return E(this,e,!1,t)},o.prototype.readDoubleLE=function(e,t){return I(this,e,!0,t)},o.prototype.readDoubleBE=function(e,t){return I(this,e,!1,t)},o.prototype.writeUInt8=function(e,t,n){n||(P(void 0!==e&&null!==e,"missing value"),P(void 0!==t&&null!==t,"missing offset"),P(t<this.length,"trying to write beyond buffer length"),q(e,255)),t>=this.length||(this[t]=e)},o.prototype.writeUInt16LE=function(e,t,n){B(this,e,t,!0,n)},o.prototype.writeUInt16BE=function(e,t,n){B(this,e,t,!1,n)},o.prototype.writeUInt32LE=function(e,t,n){A(this,e,t,!0,n)},o.prototype.writeUInt32BE=function(e,t,n){A(this,e,t,!1,n)},o.prototype.writeInt8=function(e,t,n){n||(P(void 0!==e&&null!==e,"missing value"),P(void 0!==t&&null!==t,"missing offset"),P(t<this.length,"Trying to write beyond buffer length"),O(e,127,-128)),t>=this.length||(e>=0?this.writeUInt8(e,t,n):this.writeUInt8(255+e+1,t,n))},o.prototype.writeInt16LE=function(e,t,n){_(this,e,t,!0,n)},o.prototype.writeInt16BE=function(e,t,n){_(this,e,t,!1,n)},o.prototype.writeInt32LE=function(e,t,n){L(this,e,t,!0,n)},o.prototype.writeInt32BE=function(e,t,n){L(this,e,t,!1,n)},o.prototype.writeFloatLE=function(e,t,n){U(this,e,t,!0,n)},o.prototype.writeFloatBE=function(e,t,n){U(this,e,t,!1,n)},o.prototype.writeDoubleLE=function(e,t,n){x(this,e,t,!0,n)},o.prototype.writeDoubleBE=function(e,t,n){x(this,e,t,!1,n)},o.prototype.fill=function(e,t,n){if(e||(e=0),t||(t=0),n||(n=this.length),"string"==typeof e&&(e=e.charCodeAt(0)),P("number"==typeof e&&!isNaN(e),"value is not a number"),P(n>=t,"end < start"),n!==t&&0!==this.length){P(t>=0&&t<this.length,"start out of bounds"),P(n>=0&&n<=this.length,"end out of bounds");for(var r=t;n>r;r++)this[r]=e}},o.prototype.inspect=function(){for(var e=[],t=this.length,r=0;t>r;r++)if(e[r]=M(this[r]),r===n.INSPECT_MAX_BYTES){e[r+1]="...";break}return"<Buffer "+e.join(" ")+">"},o.prototype.toArrayBuffer=function(){if("undefined"!=typeof Uint8Array){if(o._useTypedArrays)return new o(this).buffer;for(var e=new Uint8Array(this.length),t=0,n=e.length;n>t;t+=1)e[t]=this[t];return e.buffer}throw new Error("Buffer.toArrayBuffer not supported in this browser")};var Y=o.prototype;o._augment=function(e){return e._isBuffer=!0,e._get=e.get,e._set=e.set,e.get=Y.get,e.set=Y.set,e.write=Y.write,e.toString=Y.toString,e.toLocaleString=Y.toString,e.toJSON=Y.toJSON,e.copy=Y.copy,e.slice=Y.slice,e.readUInt8=Y.readUInt8,e.readUInt16LE=Y.readUInt16LE,e.readUInt16BE=Y.readUInt16BE,e.readUInt32LE=Y.readUInt32LE,e.readUInt32BE=Y.readUInt32BE,e.readInt8=Y.readInt8,e.readInt16LE=Y.readInt16LE,e.readInt16BE=Y.readInt16BE,e.readInt32LE=Y.readInt32LE,e.readInt32BE=Y.readInt32BE,e.readFloatLE=Y.readFloatLE,e.readFloatBE=Y.readFloatBE,e.readDoubleLE=Y.readDoubleLE,e.readDoubleBE=Y.readDoubleBE,e.writeUInt8=Y.writeUInt8,e.writeUInt16LE=Y.writeUInt16LE,e.writeUInt16BE=Y.writeUInt16BE,e.writeUInt32LE=Y.writeUInt32LE,e.writeUInt32BE=Y.writeUInt32BE,e.writeInt8=Y.writeInt8,e.writeInt16LE=Y.writeInt16LE,e.writeInt16BE=Y.writeInt16BE,e.writeInt32LE=Y.writeInt32LE,e.writeInt32BE=Y.writeInt32BE,e.writeFloatLE=Y.writeFloatLE,e.writeFloatBE=Y.writeFloatBE,e.writeDoubleLE=Y.writeDoubleLE,e.writeDoubleBE=Y.writeDoubleBE,e.fill=Y.fill,e.inspect=Y.inspect,e.toArrayBuffer=Y.toArrayBuffer,e}}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\buffer\\index.js","/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\buffer")},{"base64-js":2,buffer:1,htZkx4:4,ieee754:3}],2:[function(e,t,n){(function(){var e="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";!function(t){"use strict";function n(e){var t=e.charCodeAt(0);return t===a||t===d?62:t===s||t===c?63:u>t?-1:u+10>t?t-u+26+26:l+26>t?t-l:f+26>t?t-f+26:void 0}function r(e){function t(e){f[d++]=e}var r,o,a,s,u,f;if(e.length%4>0)throw new Error("Invalid string. Length must be a multiple of 4");var l=e.length;u="="===e.charAt(l-2)?2:"="===e.charAt(l-1)?1:0,f=new i(3*e.length/4-u),a=u>0?e.length-4:e.length;var d=0;for(r=0,o=0;a>r;r+=4,o+=3)s=n(e.charAt(r))<<18|n(e.charAt(r+1))<<12|n(e.charAt(r+2))<<6|n(e.charAt(r+3)),t((16711680&s)>>16),t((65280&s)>>8),t(255&s);return 2===u?(s=n(e.charAt(r))<<2|n(e.charAt(r+1))>>4,t(255&s)):1===u&&(s=n(e.charAt(r))<<10|n(e.charAt(r+1))<<4|n(e.charAt(r+2))>>2,t(s>>8&255),t(255&s)),f}function o(t){function n(t){return e.charAt(t)}function r(e){return n(e>>18&63)+n(e>>12&63)+n(e>>6&63)+n(63&e)}var o,i,a,s=t.length%3,u="";for(o=0,a=t.length-s;a>o;o+=3)i=(t[o]<<16)+(t[o+1]<<8)+t[o+2],u+=r(i);switch(s){case 1:i=t[t.length-1],u+=n(i>>2),u+=n(i<<4&63),u+="==";break;case 2:i=(t[t.length-2]<<8)+t[t.length-1],u+=n(i>>10),u+=n(i>>4&63),u+=n(i<<2&63),u+="="}return u}var i="undefined"!=typeof Uint8Array?Uint8Array:Array,a="+".charCodeAt(0),s="/".charCodeAt(0),u="0".charCodeAt(0),f="a".charCodeAt(0),l="A".charCodeAt(0),d="-".charCodeAt(0),c="_".charCodeAt(0);t.toByteArray=r,t.fromByteArray=o}("undefined"==typeof n?this.base64js={}:n)}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\buffer\\node_modules\\base64-js\\lib\\b64.js","/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\buffer\\node_modules\\base64-js\\lib")},{buffer:1,htZkx4:4}],3:[function(e,t,n){(function(){n.read=function(e,t,n,r,o){var i,a,s=8*o-r-1,u=(1<<s)-1,f=u>>1,l=-7,d=n?o-1:0,c=n?-1:1,h=e[t+d];for(d+=c,i=h&(1<<-l)-1,h>>=-l,l+=s;l>0;i=256*i+e[t+d],d+=c,l-=8);for(a=i&(1<<-l)-1,i>>=-l,l+=r;l>0;a=256*a+e[t+d],d+=c,l-=8);if(0===i)i=1-f;else{if(i===u)return a?0/0:1/0*(h?-1:1);a+=Math.pow(2,r),i-=f}return(h?-1:1)*a*Math.pow(2,i-r)},n.write=function(e,t,n,r,o,i){var a,s,u,f=8*i-o-1,l=(1<<f)-1,d=l>>1,c=23===o?Math.pow(2,-24)-Math.pow(2,-77):0,h=r?0:i-1,g=r?1:-1,p=0>t||0===t&&0>1/t?1:0;for(t=Math.abs(t),isNaN(t)||1/0===t?(s=isNaN(t)?1:0,a=l):(a=Math.floor(Math.log(t)/Math.LN2),t*(u=Math.pow(2,-a))<1&&(a--,u*=2),t+=a+d>=1?c/u:c*Math.pow(2,1-d),t*u>=2&&(a++,u/=2),a+d>=l?(s=0,a=l):a+d>=1?(s=(t*u-1)*Math.pow(2,o),a+=d):(s=t*Math.pow(2,d-1)*Math.pow(2,o),a=0));o>=8;e[n+h]=255&s,h+=g,s/=256,o-=8);for(a=a<<o|s,f+=o;f>0;e[n+h]=255&a,h+=g,a/=256,f-=8);e[n+h-g]|=128*p}}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\buffer\\node_modules\\ieee754\\index.js","/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\buffer\\node_modules\\ieee754")},{buffer:1,htZkx4:4}],4:[function(e,t){(function(e){function n(){}var e=t.exports={};e.nextTick=function(){var e="undefined"!=typeof window&&window.setImmediate,t="undefined"!=typeof window&&window.postMessage&&window.addEventListener;if(e)return function(e){return window.setImmediate(e)};if(t){var n=[];return window.addEventListener("message",function(e){var t=e.source;if((t===window||null===t)&&"process-tick"===e.data&&(e.stopPropagation(),n.length>0)){var r=n.shift();r()}},!0),function(e){n.push(e),window.postMessage("process-tick","*")}}return function(e){setTimeout(e,0)}}(),e.title="browser",e.browser=!0,e.env={},e.argv=[],e.on=n,e.addListener=n,e.once=n,e.off=n,e.removeListener=n,e.removeAllListeners=n,e.emit=n,e.binding=function(){throw new Error("process.binding is not supported")},e.cwd=function(){return"/"},e.chdir=function(){throw new Error("process.chdir is not supported")}}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\process\\browser.js","/..\\..\\..\\node_modules\\gulp-browserify\\node_modules\\browserify\\node_modules\\process")},{buffer:1,htZkx4:4}],5:[function(e,t){(function(){"use strict";function e(t,n){this.container=$("<div>"),this.options=$.extend({},e.DEFAULTS,n);var r=function(){};void 0!==t&&(this.container=$(t)),r()}e.DEFAULTS={},e.prototype.activate=function(){return this.container.removeClass("hide"),this},e.prototype.set=function(e){return this.container.html(e),this},e.prototype.load=function(e){var t=this;return $.ajax({url:e}).done(function(e){t.set(e).activate()}),this},t.exports=e}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/DataContainer.js","/")},{buffer:1,htZkx4:4}],6:[function(e,t){(function(){"use strict";function n(e,t){this.container=$("<div>"),this.options=$.extend({},n.DEFAULTS,t),this.x=0,this.y=0;var r=this,o=function(){r.container.addClass("tile"),r.container.on("mouseenter",$.proxy(r.on,r)).on("mouseout",$.proxy(r.off,r)).on("click",$.proxy(r.activate,r))};void 0!==e&&(this.container=$(e),void 0!==this.container.data("x")&&(this.x=this.container.data("x")),void 0!==this.container.data("y")&&(this.y=this.container.data("y"))),o()}n.DEFAULTS={x:0,y:0,position:{x:0,y:0}},n.prototype.render=function(){return this.container.css({top:this.options.position.y,left:this.options.position.x}),this.container},n.prototype.on=function(){this.container.addClass("on")},n.prototype.off=function(){this.container.removeClass("on")},n.prototype.activate=function(){var t="/tile/"+this.x+"/"+this.y,n=e("./DataContainer.js"),r=new n($(".data-container"));r.load(t)},t.exports=n}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/Tile.js","/")},{"./DataContainer.js":5,buffer:1,htZkx4:4}],7:[function(e){(function(){{var t=e("./Tile.js");e("./DataContainer.js")}$(".tile-container > .tile").each(function(e,n){new t(n)})}).call(this,e("htZkx4"),"undefined"!=typeof self?self:"undefined"!=typeof window?window:{},e("buffer").Buffer,arguments[3],arguments[4],arguments[5],arguments[6],"/fake_a4732352.js","/")},{"./DataContainer.js":5,"./Tile.js":6,buffer:1,htZkx4:4}]},{},[7]);