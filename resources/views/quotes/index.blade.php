<x-app-layout>
  @if (\Session::has('success'))
  <x-toast success="success">
    {!! \Session::get('success') !!}
  </x-toast>
  @endif
  <x-containers.outer-archive title="Wyceny" buttonStyle="primary" :buttonLink="url('/quotes/create')" buttonText="Dodaj nową wycenę" searchAction="/quotes">
    @isset($quotes)
    <x-table.wrapper>
      <x-table.header>
        <x-table.header-row>
          <x-table.header-cell class="sticky left-0">
            ID
          </x-table.header-cell>
          <x-table.header-cell>
            Nazwa
          </x-table.header-cell>
          <x-table.header-cell>
            Klient
          </x-table.header-cell>
          <x-table.header-cell>
            Kontakt
          </x-table.header-cell>
          <x-table.header-cell>
            Firma
          </x-table.header-cell>
          <x-table.header-cell>
            Status
          </x-table.header-cell>
          <x-table.header-cell>
            &nbsp;
          </x-table.header-cell>
        </x-table.header-row>
      </x-table.header>
      <x-table.body>
        @foreach ($quotes as $quote)
        <x-table.row>
          <x-table.cell class="sticky left-0">
            <a href="{{ url('/quotes/' . $quote->id) }}">
              {{ $quote->id }}
            </a>
          </x-table.cell>
          <x-table.cell>
            <a href="{{ url('/quotes/' . $quote->id) }}">
              {{ $quote->name }}
            </a>
          </x-table.cell>
          <x-table.cell>
            <a href="{{ url('/clients/' . $quote->client->id) }}">
              {{ $quote->client->first_name }} {{ $quote->client->last_name }}
            </a>
          </x-table.cell>
          <x-table.cell>
            <div class="flex gap-4">
              <a href="tel:{{ $quote->client->phone_number }}">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12.9582 4.52032H16.5382L15.7482 5.32032C15.5619 5.50768 15.4574 5.76113 15.4574 6.02532C15.4574 6.2895 15.5619 6.54295 15.7482 6.73032C15.9355 6.91657 16.189 7.02111 16.4532 7.02111C16.7174 7.02111 16.9708 6.91657 17.1582 6.73032L19.6582 4.23032C19.8444 4.04295 19.949 3.7895 19.949 3.52532C19.949 3.26113 19.8444 3.00768 19.6582 2.82032L17.1582 0.320317C16.9669 0.156491 16.7208 0.0708848 16.4691 0.080606C16.2174 0.0903271 15.9787 0.19466 15.8006 0.372754C15.6225 0.550849 15.5182 0.789588 15.5085 1.04126C15.4987 1.29294 15.5843 1.53902 15.7482 1.73032L16.5382 2.52032H12.9582C12.693 2.52032 12.4386 2.62567 12.2511 2.81321C12.0635 3.00075 11.9582 3.2551 11.9582 3.52032C11.9582 3.78553 12.0635 4.03989 12.2511 4.22742C12.4386 4.41496 12.693 4.52032 12.9582 4.52032ZM17.4582 10.9603C17.2382 10.9603 17.0082 10.8903 16.7882 10.8403C16.3427 10.7421 15.9048 10.6118 15.4782 10.4503C15.0143 10.2815 14.5043 10.2903 14.0465 10.4749C13.5886 10.6595 13.2153 11.007 12.9982 11.4503L12.7782 11.9003C11.8042 11.3585 10.9092 10.6855 10.1182 9.90032C9.33294 9.10933 8.65999 8.21431 8.11817 7.24032L8.53817 6.96032C8.98153 6.74323 9.32895 6.36985 9.51356 5.91201C9.69817 5.45417 9.70694 4.94423 9.53817 4.48032C9.37939 4.05274 9.2491 3.61512 9.14817 3.17032C9.09817 2.95032 9.05817 2.72032 9.02817 2.49032C8.90673 1.78594 8.53779 1.14806 7.98779 0.691557C7.43779 0.235054 6.74286 -0.0100738 6.02817 0.000317303H3.02817C2.5972 -0.00372924 2.17042 0.0851307 1.77688 0.260848C1.38334 0.436565 1.03228 0.695013 0.747598 1.0186C0.462918 1.34219 0.251302 1.72331 0.127155 2.13603C0.00300869 2.54875 -0.0307535 2.98338 0.0281672 3.41032C0.560905 7.5997 2.4742 11.4922 5.46582 14.473C8.45744 17.4537 12.3569 19.3528 16.5482 19.8703H16.9282C17.6656 19.8714 18.3776 19.6008 18.9282 19.1103C19.2445 18.8274 19.4973 18.4805 19.6696 18.0926C19.842 17.7048 19.9301 17.2848 19.9282 16.8603V13.8603C19.9159 13.1657 19.663 12.4969 19.2125 11.968C18.762 11.4391 18.142 11.0829 17.4582 10.9603ZM17.9582 16.9603C17.958 17.1023 17.9276 17.2426 17.8689 17.3719C17.8103 17.5013 17.7248 17.6166 17.6182 17.7103C17.5064 17.8068 17.3758 17.8789 17.2346 17.9219C17.0934 17.965 16.9447 17.978 16.7982 17.9603C13.0531 17.4801 9.5744 15.7668 6.91088 13.0906C4.24736 10.4144 2.55058 6.92765 2.08817 3.18032C2.07225 3.03384 2.0862 2.88565 2.12917 2.74471C2.17214 2.60377 2.24324 2.473 2.33817 2.36032C2.43188 2.25365 2.54723 2.16816 2.67655 2.10953C2.80586 2.05091 2.94618 2.0205 3.08817 2.02032H6.08817C6.32071 2.01514 6.54779 2.0912 6.73031 2.23539C6.91283 2.37958 7.03938 2.58289 7.08817 2.81032C7.12817 3.08365 7.17817 3.35365 7.23817 3.62032C7.35369 4.14746 7.50743 4.6655 7.69817 5.17032L6.29817 5.82032C6.17846 5.87524 6.07079 5.95326 5.98132 6.04991C5.89186 6.14656 5.82237 6.25993 5.77684 6.38351C5.73131 6.50709 5.71064 6.63845 5.71601 6.77004C5.72139 6.90163 5.75271 7.03086 5.80817 7.15032C7.24737 10.2331 9.72541 12.7111 12.8082 14.1503C13.0516 14.2503 13.3247 14.2503 13.5682 14.1503C13.6929 14.1057 13.8075 14.0368 13.9053 13.9475C14.0032 13.8582 14.0823 13.7504 14.1382 13.6303L14.7582 12.2303C15.2751 12.4152 15.8028 12.5688 16.3382 12.6903C16.6048 12.7503 16.8748 12.8003 17.1482 12.8403C17.3756 12.8891 17.5789 13.0157 17.7231 13.1982C17.8673 13.3807 17.9433 13.6078 17.9382 13.8403L17.9582 16.9603Z" fill="currentColor" />
                </svg>
              </a>
              <a href="mailto:{{ $quote->client->email }}">
                <svg width="20" height="18" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15 4H16V5C16 5.26522 16.1054 5.51957 16.2929 5.70711C16.4804 5.89464 16.7348 6 17 6C17.2652 6 17.5196 5.89464 17.7071 5.70711C17.8946 5.51957 18 5.26522 18 5V4H19C19.2652 4 19.5196 3.89464 19.7071 3.70711C19.8946 3.51957 20 3.26522 20 3C20 2.73478 19.8946 2.48043 19.7071 2.29289C19.5196 2.10536 19.2652 2 19 2H18V1C18 0.734784 17.8946 0.48043 17.7071 0.292893C17.5196 0.105357 17.2652 0 17 0C16.7348 0 16.4804 0.105357 16.2929 0.292893C16.1054 0.48043 16 0.734784 16 1V2H15C14.7348 2 14.4804 2.10536 14.2929 2.29289C14.1054 2.48043 14 2.73478 14 3C14 3.26522 14.1054 3.51957 14.2929 3.70711C14.4804 3.89464 14.7348 4 15 4ZM19 8C18.7348 8 18.4804 8.10536 18.2929 8.29289C18.1054 8.48043 18 8.73478 18 9V15C18 15.2652 17.8946 15.5196 17.7071 15.7071C17.5196 15.8946 17.2652 16 17 16H3C2.73478 16 2.48043 15.8946 2.29289 15.7071C2.10536 15.5196 2 15.2652 2 15V5.41L7.88 11.3C8.4425 11.8618 9.205 12.1774 10 12.1774C10.795 12.1774 11.5575 11.8618 12.12 11.3L14.59 8.83C14.7783 8.6417 14.8841 8.3863 14.8841 8.12C14.8841 7.8537 14.7783 7.5983 14.59 7.41C14.4017 7.2217 14.1463 7.11591 13.88 7.11591C13.6137 7.11591 13.3583 7.2217 13.17 7.41L10.7 9.88C10.5131 10.0632 10.2618 10.1659 10 10.1659C9.73825 10.1659 9.48693 10.0632 9.3 9.88L3.41 4H11C11.2652 4 11.5196 3.89464 11.7071 3.70711C11.8946 3.51957 12 3.26522 12 3C12 2.73478 11.8946 2.48043 11.7071 2.29289C11.5196 2.10536 11.2652 2 11 2H3C2.20435 2 1.44129 2.31607 0.87868 2.87868C0.316071 3.44129 0 4.20435 0 5V15C0 15.7956 0.316071 16.5587 0.87868 17.1213C1.44129 17.6839 2.20435 18 3 18H17C17.7956 18 18.5587 17.6839 19.1213 17.1213C19.6839 16.5587 20 15.7956 20 15V9C20 8.73478 19.8946 8.48043 19.7071 8.29289C19.5196 8.10536 19.2652 8 19 8Z" fill="currentColor" />
                </svg>
              </a>
            </div>
          </x-table.cell>
          <x-table.cell>
            {{ $quote->client->company }}
          </x-table.cell>
          <x-table.cell>
            <?php
            $hex = "{$quote->state->color}";
            list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
            $value = $r . $g . $b;
            if ($r + $g + $b < 350) {
              $textcolor = 'color:white;';
            } else {
              $textcolor = 'color:black;';
            }
            $bgcolor = 'background-color:' . $hex . ';';
            echo "<strong class='px-3 py-1 rounded-lg bg-opacity-20'style=\"$bgcolor $textcolor\">";
            ?>
            <strong>
              {{ $quote->state->state }}
            </strong>
          </x-table.cell>
          <x-table.cell>
            <form method="POST" action="/quotes/{{ $quote->id }}">
              @csrf
              @method('DELETE')
              <button type="submit" class="hover:text-red-600">
                <svg class="text-blue-500" width="18" height="18" viewBox="0 0 24 24" stroke="currentColor">
                  <path fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </form>
          </x-table.cell>
        </x-table.row>
        @endforeach
      </x-table.body>
    </x-table.wrapper>
    {!! $quotes->links() !!}

    @endisset
  </x-containers.outer-archive>
</x-app-layout>