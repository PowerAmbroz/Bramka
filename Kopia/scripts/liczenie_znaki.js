function countChar(val) {
        var len = val.value.length;
        if (len >= 130) {
          val.value = val.value.substring(0, 130);
        } else {
          $('#charNum').text(130 - len);
        }
      };
