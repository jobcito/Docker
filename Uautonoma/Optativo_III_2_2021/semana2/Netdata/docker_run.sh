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
  -e NETDATA_CLAIM_TOKEN=QPA2AycoiVCOHGwOkRrqo1xOsY5Lv4wnrRWrgHEvw7w1MVEDy8UtC8DZl8RKdlDh_Dkr6RiOs52oqXRv9easEjDbeu3BD8ihW1UvTz-dtLBfN0DWd-veMbG44tVtuLSGbKtb85w \
  -e NETDATA_CLAIM_URL=https://app.netdata.cloud \
  -e NETDATA_CLAIM_ROOMS=1905ecb6-1765-4ea4-b254-101e95016747 \
  netdata/netdata \
  /