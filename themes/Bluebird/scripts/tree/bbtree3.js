// Generated by CoffeeScript 1.6.3
var BBTagLabel, getTrees, instance, parseTree, tree, treeBehavior, _treeData,
  __slice = [].slice,
  __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

tree = {
  startInstance: function(submittedProperties) {
    var initInstance, request,
      _this = this;
    initInstance = new instance();
    this.setProp(submittedProperties, initInstance);
    request = cj.when(getTrees.getRawJSON(initInstance));
    request.done(function(data) {
      getTrees.putRawJSON(data.message, initInstance);
      parseTree.init(initInstance);
      return initInstance.set('ready', true);
    });
    return initInstance;
  },
  setProp: function() {
    var instance, k, properties, v, _i, _ref, _results;
    properties = 2 <= arguments.length ? __slice.call(arguments, 0, _i = arguments.length - 1) : (_i = 0, []), instance = arguments[_i++];
    _ref = properties[0];
    _results = [];
    for (k in _ref) {
      v = _ref[k];
      _results.push(instance.set(k, v));
    }
    return _results;
  }
};

treeBehavior = {
  getEntityTags: function() {},
  tagActions: function() {}
};

if (window.jstree == null) {
  window.jstree = tree;
}

if (window.CRM == null) {
  window.CRM = {};
}

getTrees = {
  getRawJSON: function(instance) {
    return cj.ajax(instance.get('callAjax'));
  },
  putRawJSON: function(data, instance) {
    return cj.each(data, function(i, tID) {
      var _ref;
      if (_ref = parseFloat(tID.id), __indexOf.call(instance.get('dataSettings').pullSets, _ref) >= 0) {
        return _treeData.rawData[tID.id] = {
          'name': tID.name,
          'children': tID.children
        };
      }
    });
  }
};

parseTree = {
  init: function(instance) {
    var _this = this;
    cj.each(_treeData.rawData, function(id, cID) {
      var tagName, _ref;
      if (_ref = parseFloat(id), __indexOf.call(instance.get('dataSettings').pullSets, _ref) >= 0) {
        _this.output = '';
        _this.tagLvl = 0;
        _this.setDataType(cID.name);
        _this.autocompleteObj = [];
        _this.treeTop = id;
        tagName = new BBTagLabel(id);
        _this.addTabName(cID.name, id);
        _this.output += "<dl class='top-" + id + " tagContainer'>";
        cj.each(cID.children, function(id, tID) {
          return _this.writeOutputData(tID);
        });
        _this.output += "</dl>";
        return _this.writeData();
      }
    });
    return console.log("Loaded Data at " + (new Date()));
  },
  isItemMarked: function(value, type) {
    if (value(true)) {
      return type;
    } else {
      return '';
    }
  },
  isItemChildless: function(childLength) {
    if (childLength > 0) {
      return 'treeButton';
    } else {
      return '';
    }
  },
  writeOutputData: function(tID, parentTag) {
    var hasChild, tagName,
      _this = this;
    tagName = new BBTagLabel(tID.id);
    this.addAutocompleteEntry(tID.id, tID.name);
    if (tID.children.length > 0) {
      hasChild = true;
    } else {
      hasChild = false;
    }
    this.addDTtag(tagName, tID.name, parentTag, hasChild);
    this.addDLtop(tagName, tID.name);
    if (hasChild) {
      cj.each(tID.children, function(id, cID) {
        return _this.writeOutputData(cID, tID.id);
      });
      return this.addDLbottom();
    } else {
      return this.addDLbottom();
    }
  },
  addTabName: function(name, id) {
    return _treeData.treeNames[id] = name;
  },
  addDLtop: function(tagName, name) {
    return this.output += "<dl class='lv-" + this.tagLvl + "' id='" + (tagName.addDD()) + "' data-name='" + name + "'>";
  },
  addDTtag: function(tagName, name, parentTag, hasChild, except) {
    var treeButton;
    if (!except) {
      this.tagLvl++;
    }
    if (hasChild) {
      treeButton = "treeButton";
    } else {
      treeButton = "";
    }
    if (parentTag == null) {
      parentTag = this.treeTop;
    }
    this.output += "<dt class='lv-" + this.tagLvl + " " + this.tagType + "-" + (tagName.passThru()) + "' id='" + (tagName.add()) + "' data-tagid='" + (tagName.passThru()) + "' data-name='" + name + "' data-parentid='" + parentTag + "'>";
    this.output += "<div class='tag'>";
    this.output += "<div class='ddControl " + treeButton + "'></div>";
    this.output += "<span class='name'>" + name + "</span></div>";
    return this.output += "</dt>";
  },
  addDLbottom: function() {
    this.tagLvl--;
    return this.output += "</dl>";
  },
  setDataType: function(name) {
    switch (name) {
      case "Issue Code":
        return this.tagType = "issueCode";
      case "Positions":
        return this.tagType = "position";
      case "Keywords":
        return this.tagType = "keyword";
      default:
        return this.tagType = "tag";
    }
  },
  addAutocompleteEntry: function(id, name) {
    var tempObj;
    tempObj = {
      "name": name,
      "id": id,
      "type": this.treeTop
    };
    return this.autocompleteObj.push(tempObj);
  },
  writeData: function() {
    _treeData.autocomplete = _treeData.autocomplete.concat(this.autocompleteObj);
    return _treeData.html[this.treeTop] = this.output;
  }
};

_treeData = {
  autocomplete: [],
  rawData: {},
  html: {},
  treeNames: []
};

instance = (function() {
  function instance() {
    var callAjax, dataSettings, displaySettings, onSave, pageElements, ready,
      _this = this;
    pageElements = {
      init: 'JSTreeInit',
      wrapper: 'JSTreeContainer',
      tagHolder: ['JSTree'],
      messageHandler: ['JSMessages'],
      location: ''
    };
    onSave = false;
    ready = false;
    dataSettings = {
      pullSets: [291, 296],
      contact: 0
    };
    displaySettings = {
      defaultTree: 291,
      mode: 'edit',
      size: 'full',
      autocomplete: true,
      print: true,
      showActive: true,
      showStubs: false
    };
    callAjax = {
      url: 'localtagdata.json',
      dataType: 'json'
    };
    this.get = function(name) {
      var getRet;
      getRet = {};
      if ('pageElements' === name) {
        cj.extend(true, getRet, pageElements);
      }
      if ('onSave' === name) {
        return onSave;
      }
      if ('dataSettings' === name) {
        cj.extend(true, getRet, dataSettings);
      }
      if ('displaySettings' === name) {
        cj.extend(true, getRet, displaySettings);
      }
      if ('callAjax' === name) {
        cj.extend(true, getRet, callAjax);
      }
      if ('ready' === name) {
        return ready;
      }
      return getRet;
    };
    this.set = function(name, obj) {
      if ('pageElements' === name) {
        obj = _this.checkForArray(pageElements, obj);
        cj.extend(true, pageElements, obj);
      }
      if ('onSave' === name) {
        onSave = obj;
      }
      if ('dataSettings' === name) {
        obj = _this.checkForArray(dataSettings, obj);
        cj.extend(true, dataSettings, obj);
      }
      if ('displaySettings' === name) {
        obj = _this.checkForArray(displaySettings, obj);
        cj.extend(true, displaySettings, obj);
      }
      if ('callAjax' === name) {
        obj = _this.checkForArray(callAjax, obj);
        cj.extend(true, callAjax, obj);
      }
      if ('ready' === name) {
        return ready = obj;
      }
    };
    this.getAutocomplete = function() {
      return _treeData.autocomplete;
    };
  }

  instance.prototype.removeDupFromExtend = function(obj) {
    var _this = this;
    return cj.each(obj, function(k, v) {
      if (cj.isPlainObject(v)) {
        _this.removeDupFromExtend(v);
      }
      return v = bbUtils.uniqueAry(v);
    });
  };

  instance.prototype.checkForArray = function(propDefault, obj) {
    return cj.each(obj, function(k, def) {
      var a, ar, b, c, i, _i, _j, _len, _len1;
      if (cj.isArray(def) && cj.isArray(propDefault[k])) {
        a = propDefault[k].sort();
        b = def.sort();
        for (i = _i = 0, _len = a.length; _i < _len; i = ++_i) {
          c = a[i];
          if (c !== b[i]) {
            for (_j = 0, _len1 = def.length; _j < _len1; _j++) {
              ar = def[_j];
              if (propDefault[k].indexOf(ar) < 0) {
                propDefault[k].push(ar);
              }
            }
          }
        }
        return obj[k] = propDefault[k];
      }
    });
  };

  return instance;

})();

BBTagLabel = (function() {
  function BBTagLabel(tagID) {
    this.tagID = tagID;
  }

  BBTagLabel.prototype.add = function() {
    return "tagLabel_" + this.tagID;
  };

  BBTagLabel.prototype.remove = function() {
    return this.tagID.replace("tagLabel_", "");
  };

  BBTagLabel.prototype.addDD = function() {
    return "tagDropdown_" + this.tagID;
  };

  BBTagLabel.prototype.removeDD = function() {
    return this.tagID.replace("tagDropdown_", "");
  };

  BBTagLabel.prototype.passThru = function() {
    return this.tagID;
  };

  return BBTagLabel;

})();
