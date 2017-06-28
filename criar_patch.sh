#!/bin/bash
rm -v tc.xdelta
xdelta3 -e -s orig.nds tc.nds tc.xdelta
