#!/usr/bin/zsh

docker run -d --name=netdata \
  -p 19999:19999 \
  -v netdataconfig:/etc/netdata \
  -v netdatalib:/var/lib/netdata \
  -v netdatacache:/var/cache/netdata \
  -v /etc/passwd:/host/etc/passwd:ro \
  -v /etc/group:/host/etc/group:ro \
  -v /proc:/host/proc:ro \
  -v /sys:/host/sys:ro \
  -v /etc/os-release:/host/etc/os-release:ro \
  --restart unless-stopped \
  --cap-add SYS_PTRACE \
  --security-opt apparmor=unconfined \
  -e NETDATA_CLAIM_TOKEN=sZpekOiXleRNDpM-8Stb--14yxA1qPnEQAR_RO3Z2676DiXFaYvoRU3lpyk3Fevt0WkciNCbNH6n21recMrcxrbS-_hU0QNCC3FEbyMY21DIv-X-nPs0Lmith50shp_Ilym_rBs \
  -e NETDATA_CLAIM_URL=https://app.netdata.cloud \
  -e NETDATA_CLAIM_ROOMS=1a461069-390d-4f57-af99-d8a35aa843ca \
  netdata/netdata \
  /